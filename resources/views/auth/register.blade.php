@extends('layouts.app')

@section('title', 'Sign Up - Flag Subscription Service')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900">Create Account</h2>
                <p class="mt-2 text-gray-600">Join our flag service today</p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Registration Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Full Name
                    </label>
                    <input id="name"
                           name="name"
                           type="text"
                           required
                           autofocus
                           value="{{ old('name') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="John Doe">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email Address
                    </label>
                    <input id="email"
                           name="email"
                           type="email"
                           required
                           value="{{ old('email') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="you@example.com">
                </div>

                <!-- Phone (Optional) -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                        Phone Number <span class="text-gray-500 text-xs">(Optional)</span>
                    </label>
                    <input id="phone"
                           name="phone"
                           type="tel"
                           value="{{ old('phone') }}"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="(555) 123-4567">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                        Password
                    </label>
                    <input id="password"
                           name="password"
                           type="password"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Minimum 8 characters">
                    <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters</p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                        Confirm Password
                    </label>
                    <input id="password_confirmation"
                           name="password_confirmation"
                           type="password"
                           required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="Re-enter password">
                </div>

                <!-- Terms -->
                <div class="flex items-start">
                    <input id="terms"
                           name="terms"
                           type="checkbox"
                           required
                           class="h-4 w-4 text-blue-900 focus:ring-blue-500 border-gray-300 rounded mt-1">
                    <label for="terms" class="ml-2 block text-sm text-gray-700">
                        I agree to the
                        <a href="{{ route('terms') }}" class="text-blue-900 hover:text-blue-700" target="_blank">Terms of Service</a>
                        and
                        <a href="{{ route('privacy') }}" class="text-blue-900 hover:text-blue-700" target="_blank">Privacy Policy</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-blue-900 text-white px-4 py-3 rounded-lg font-medium hover:bg-blue-800 transition">
                    Create Account
                </button>
            </form>

            <!-- Login Link -->
            <div class="mt-6 text-center">
                <p class="text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-900 hover:text-blue-700 font-medium">
                        Sign in
                    </a>
                </p>
            </div>

            <!-- Benefits -->
            <div class="mt-6 pt-6 border-t">
                <p class="text-xs text-gray-600 font-semibold mb-2">Benefits of signing up:</p>
                <ul class="text-xs text-gray-600 space-y-1">
                    <li>✓ Save time with easy checkout</li>
                    <li>✓ Track your subscriptions</li>
                    <li>✓ Manage your service locations</li>
                    <li>✓ View payment history</li>
                </ul>
            </div>
        </div>

        <!-- Security Notice -->
        <div class="mt-4 text-center">
            <p class="text-xs text-gray-500">
                <svg class="inline-block w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
                Your information is secure and encrypted
            </p>
        </div>
    </div>
</div>
@endsection
