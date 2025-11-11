@extends('layouts.app')

@section('title', 'Terms of Service - Flag Subscription Service')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-6">Terms of Service</h1>
        <p class="text-gray-600 mb-8">Last updated: November 10, 2025</p>

        <div class="prose prose-lg max-w-none space-y-6">
            <section>
                <h2 class="text-2xl font-semibold mb-3">1. Acceptance of Terms</h2>
                <p class="text-gray-700">
                    By accessing and using Flag Subscription Service, you accept and agree to be bound by the terms and provision of this agreement.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">2. Service Description</h2>
                <p class="text-gray-700">
                    Flag Subscription Service provides professional flag installation and maintenance services for patriotic holidays.
                    We offer both one-time and subscription-based services.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">3. User Accounts</h2>
                <p class="text-gray-700">
                    You are responsible for maintaining the confidentiality of your account and password. You agree to accept
                    responsibility for all activities that occur under your account.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">4. Payment Terms</h2>
                <p class="text-gray-700">
                    Payment is due at the time of service for one-time orders. Subscription services are billed annually in advance.
                    All payments are processed securely through Stripe.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">5. Cancellation Policy</h2>
                <p class="text-gray-700">
                    Subscriptions may be cancelled at any time. Cancellations take effect at the end of the current billing period.
                    No refunds are provided for services already rendered.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">6. Service Availability</h2>
                <p class="text-gray-700">
                    We make every effort to provide service on scheduled dates. However, service may be delayed or rescheduled
                    due to weather conditions or other circumstances beyond our control.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">7. Contact Information</h2>
                <p class="text-gray-700">
                    For questions about these Terms of Service, please contact us at: <br>
                    Email: info@flagservice.com<br>
                    Phone: (555) 123-4567
                </p>
            </section>
        </div>

        <div class="mt-8 pt-8 border-t text-center">
            <a href="{{ route('home') }}" class="text-blue-900 hover:text-blue-700 font-medium">
                ← Back to Home
            </a>
        </div>
    </div>
</div>
@endsection
