@extends('layouts.app')

@section('title', 'Order Successful - Flag Subscription Service')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-3xl mx-auto">
        <!-- Success Message -->
        <div class="bg-green-50 border-2 border-green-500 rounded-lg p-8 mb-8 text-center">
            <svg class="w-20 h-20 text-green-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Order Successful!</h1>
            <p class="text-lg text-gray-700">Thank you for your purchase. Your order has been confirmed.</p>
        </div>

        <!-- Order Details -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold mb-6">Order Details</h2>

            @if(isset($subscriptions) && count($subscriptions) > 0)
                <div class="space-y-6">
                    @foreach($subscriptions as $subscription)
                        <div class="border-b pb-6 last:border-b-0">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $subscription->flag->name }}</h3>
                                    <p class="text-sm text-gray-600 mt-1">
                                        {{ $subscription->subscription_type === 'subscription' ? 'Yearly Subscription' : 'One-Time Purchase' }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold text-gray-900">${{ number_format($subscription->price, 2) }}</p>
                                    <span class="inline-block px-3 py-1 text-xs font-medium text-green-800 bg-green-100 rounded-full mt-2">
                                        Active
                                    </span>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <p class="text-gray-600">Installation Address:</p>
                                    <p class="font-medium text-gray-900">{{ $subscription->location->address }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-600">Start Date:</p>
                                    <p class="font-medium text-gray-900">{{ $subscription->start_date->format('M d, Y') }}</p>
                                </div>
                            </div>

                            @if($subscription->subscription_type === 'subscription')
                                <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                                    <div class="flex items-start">
                                        <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <div class="text-sm text-blue-800">
                                            <p class="font-semibold mb-1">Your subscription includes:</p>
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Automatic seasonal flag changes</li>
                                                <li>Professional installation and removal</li>
                                                <li>Flag cleaning and maintenance</li>
                                                <li>Priority customer support</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Order Confirmation Email Notice -->
            <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-gray-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    <div class="text-sm text-gray-700">
                        <p class="font-semibold mb-1">Order Confirmation Email Sent</p>
                        <p>We've sent a confirmation email to <strong>{{ auth()->user()->email }}</strong> with your order details and receipt.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Next Steps -->
        <div class="bg-white rounded-lg shadow-lg p-8 mb-8">
            <h2 class="text-2xl font-semibold mb-4">What Happens Next?</h2>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold mr-4">
                        1
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Installation Scheduled</h3>
                        <p class="text-gray-600">Our team will contact you within 24-48 hours to schedule your flag installation.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold mr-4">
                        2
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Professional Installation</h3>
                        <p class="text-gray-600">Our certified technicians will install your flag(s) at your specified location.</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-8 h-8 bg-blue-900 text-white rounded-full flex items-center justify-center font-bold mr-4">
                        3
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Ongoing Support</h3>
                        <p class="text-gray-600">Track your subscription and manage your account from your dashboard.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('dashboard') }}"
               class="flex-1 bg-blue-900 text-white px-6 py-3 rounded-lg font-medium text-center hover:bg-blue-800 transition">
                View Dashboard
            </a>
            <a href="{{ route('flags.index') }}"
               class="flex-1 bg-white text-blue-900 border-2 border-blue-900 px-6 py-3 rounded-lg font-medium text-center hover:bg-blue-50 transition">
                Browse More Flags
            </a>
        </div>

        <!-- Customer Support -->
        <div class="mt-8 text-center text-sm text-gray-600">
            <p>Need help? Contact our support team at <a href="mailto:support@flagservice.com" class="text-blue-900 font-medium hover:underline">support@flagservice.com</a></p>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Clear cart from localStorage on success
    localStorage.removeItem('flagCart');

    // Update cart count
    const badge = document.getElementById('cart-count');
    if (badge) {
        badge.style.display = 'none';
        badge.textContent = '0';
    }
</script>
@endpush
@endsection
