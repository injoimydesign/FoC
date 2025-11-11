<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.

    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the customer dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        $subscriptions = $user->subscriptions()->with(['flag', 'location'])->latest()->get();
        $payments = $user->payments()->latest()->limit(10)->get();

        return view('dashboard', compact('user', 'subscriptions', 'payments'));
    }

    /**
     * Show the user profile.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * Update the user profile.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return back()->with('success', 'Profile updated successfully!');
    }
}
