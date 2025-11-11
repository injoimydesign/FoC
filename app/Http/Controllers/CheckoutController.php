<?php

namespace App\Http\Controllers;

use App\Models\Flag;
use App\Models\Location;
use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    /**
     * Show the checkout form.
     */
    public function index()
    {
        $flags = Flag::active()->get();
        return view('checkout.index', compact('flags'));
    }

    /**
     * Create a Stripe checkout session.
     */
    public function createSession(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'flag_id' => 'required|exists:flags,id',
            'purchase_type' => 'required|in:one_time,subscription',
            'notes' => 'nullable|string',
        ]);

        $flag = Flag::findOrFail($request->flag_id);
        $user = Auth::user();

        // Calculate prices
        $basePrice = $flag->base_price;
        $processingFee = Payment::calculateProcessingFee($basePrice);
        $totalAmount = $basePrice + $processingFee;

        // Create or get location
        $location = Location::firstOrCreate(
            ['user_id' => $user->id, 'address' => $request->address],
            ['notes' => $request->notes, 'active' => true]
        );

        try {
            if ($request->purchase_type === 'subscription') {
                // Yearly subscription
                $yearlyPrice = $basePrice * 12 * 0.8; // 20% discount
                
                $session = Session::create([
                    'customer_email' => $request->email,
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'Flag Service - Yearly Subscription',
                                'description' => 'Annual flag service with automatic seasonal changes',
                            ],
                            'unit_amount' => round($yearlyPrice * 100),
                            'recurring' => ['interval' => 'year'],
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'subscription',
                    'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('checkout.index'),
                    'metadata' => [
                        'user_id' => $user->id,
                        'flag_id' => $flag->id,
                        'location_id' => $location->id,
                        'purchase_type' => 'subscription',
                    ],
                ]);
            } else {
                // One-time payment
                $session = Session::create([
                    'customer_email' => $request->email,
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $flag->name,
                                'description' => $flag->description,
                                'images' => [$flag->image_url],
                            ],
                            'unit_amount' => round($totalAmount * 100),
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                    'cancel_url' => route('checkout.index'),
                    'metadata' => [
                        'user_id' => $user->id,
                        'flag_id' => $flag->id,
                        'location_id' => $location->id,
                        'purchase_type' => 'one_time',
                    ],
                ]);
            }

            return response()->json(['url' => $session->url]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Handle successful payment.
     */
    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');
        
        if (!$sessionId) {
            return redirect()->route('home')->with('error', 'Invalid session');
        }

        try {
            $session = Session::retrieve($sessionId);
            $metadata = $session->metadata;

            // Create subscription
            $subscription = Subscription::create([
                'user_id' => $metadata->user_id,
                'flag_id' => $metadata->flag_id,
                'location_id' => $metadata->location_id,
                'stripe_customer_id' => $session->customer,
                'stripe_subscription_id' => $session->subscription ?? null,
                'subscription_type' => $metadata->purchase_type,
                'price' => $session->amount_total / 100,
                'start_date' => now(),
                'active' => true,
            ]);

            // Create payment record
            Payment::create([
                'user_id' => $metadata->user_id,
                'subscription_id' => $subscription->id,
                'stripe_session_id' => $sessionId,
                'amount' => $session->amount_total / 100,
                'status' => 'completed',
                'payment_type' => $metadata->purchase_type,
            ]);

            return view('checkout.success', compact('subscription'));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Payment verification failed');
        }
    }
}
