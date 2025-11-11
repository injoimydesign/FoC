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
     * Accessible to guests, but they'll need to login to complete payment.
     */
    public function index()
    {
        $flags = Flag::active()->get();
        return view('checkout.index', compact('flags'));
    }

    /**
     * Create a Stripe checkout session.
     * Requires authentication.
     */
    public function createSession(Request $request)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return response()->json([
                'error' => 'Authentication required',
                'redirect' => route('login')
            ], 401);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'purchase_type' => 'required|in:one_time,subscription',
            'notes' => 'nullable|string',
            'cart_items' => 'required|array|min:1',
            'cart_items.*.flag_id' => 'required|exists:flags,id',
            'cart_items.*.quantity' => 'required|integer|min:1',
            'cart_items.*.base_price' => 'required|numeric|min:0',
        ]);

        $user = Auth::user();
        $cartItems = $request->cart_items;

        // Create or get location
        $location = Location::firstOrCreate(
            ['user_id' => $user->id, 'address' => $request->address],
            ['notes' => $request->notes, 'active' => true]
        );

        try {
            // Build line items for Stripe
            $lineItems = [];
            $totalAmount = 0;
            $metadata = [
                'user_id' => $user->id,
                'location_id' => $location->id,
                'purchase_type' => $request->purchase_type,
            ];

            foreach ($cartItems as $index => $item) {
                $flag = Flag::findOrFail($item['flag_id']);
                $quantity = (int) $item['quantity'];
                $basePrice = (float) $item['base_price'];

                // Calculate processing fee for this item
                $processingFee = Payment::calculateProcessingFee($basePrice);
                $itemTotal = ($basePrice + $processingFee) * $quantity;
                $totalAmount += $itemTotal;

                // Store flag IDs in metadata
                $metadata["flag_id_{$index}"] = $flag->id;
                $metadata["quantity_{$index}"] = $quantity;

                if ($request->purchase_type === 'subscription') {
                    // Yearly subscription with 20% discount
                    $yearlyPrice = $basePrice * 12 * 0.8;
                    $yearlyPriceWithFee = $yearlyPrice + Payment::calculateProcessingFee($yearlyPrice);

                    $lineItems[] = [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $flag->name . ' - Yearly Subscription',
                                'description' => 'Annual flag service with automatic seasonal changes',
                                'images' => [$flag->image_url],
                            ],
                            'unit_amount' => round($yearlyPriceWithFee * 100),
                            'recurring' => ['interval' => 'year'],
                        ],
                        'quantity' => $quantity,
                    ];
                } else {
                    // One-time payment
                    $lineItems[] = [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $flag->name,
                                'description' => $flag->description,
                                'images' => [$flag->image_url],
                            ],
                            'unit_amount' => round(($basePrice + $processingFee) * 100),
                        ],
                        'quantity' => $quantity,
                    ];
                }
            }

            // Create Stripe session
            $sessionData = [
                'customer_email' => $request->email,
                'line_items' => $lineItems,
                'mode' => $request->purchase_type === 'subscription' ? 'subscription' : 'payment',
                'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('checkout.index'),
                'metadata' => $metadata,
            ];

            $session = Session::create($sessionData);

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

            // Create subscriptions for each item
            $subscriptions = [];
            $itemIndex = 0;

            while (isset($metadata["flag_id_{$itemIndex}"])) {
                $subscription = Subscription::create([
                    'user_id' => $metadata->user_id,
                    'flag_id' => $metadata["flag_id_{$itemIndex}"],
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
                    'amount' => ($session->amount_total / 100) / count($metadata),
                    'status' => 'completed',
                    'payment_type' => $metadata->purchase_type,
                ]);

                $subscriptions[] = $subscription;
                $itemIndex++;
            }

            return view('checkout.success', compact('subscriptions'));
        } catch (\Exception $e) {
            return redirect()->route('home')->with('error', 'Payment verification failed: ' . $e->getMessage());
        }
    }
}
