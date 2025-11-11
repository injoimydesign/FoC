@extends('layouts.app')

@section('title', 'Privacy Policy - Flag Subscription Service')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-6">Privacy Policy</h1>
        <p class="text-gray-600 mb-8">Last updated: November 10, 2025</p>

        <div class="prose prose-lg max-w-none space-y-6">
            <section>
                <h2 class="text-2xl font-semibold mb-3">1. Information We Collect</h2>
                <p class="text-gray-700 mb-3">We collect information you provide directly to us, including:</p>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Name and contact information</li>
                    <li>Service address</li>
                    <li>Payment information (processed securely by Stripe)</li>
                    <li>Communication preferences</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">2. How We Use Your Information</h2>
                <p class="text-gray-700 mb-3">We use the information we collect to:</p>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Provide, maintain, and improve our services</li>
                    <li>Process your transactions</li>
                    <li>Send you service updates and notifications</li>
                    <li>Respond to your comments and questions</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">3. Information Sharing</h2>
                <p class="text-gray-700">
                    We do not sell or rent your personal information to third parties. We may share your information with
                    service providers who assist us in operating our business, such as payment processors (Stripe).
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">4. Data Security</h2>
                <p class="text-gray-700">
                    We take reasonable measures to help protect your personal information from loss, theft, misuse,
                    unauthorized access, disclosure, alteration, and destruction.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">5. Cookies</h2>
                <p class="text-gray-700">
                    We use cookies and similar tracking technologies to track activity on our service and hold certain information.
                    You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">6. Your Rights</h2>
                <p class="text-gray-700 mb-3">You have the right to:</p>
                <ul class="list-disc list-inside text-gray-700 space-y-1">
                    <li>Access and update your personal information</li>
                    <li>Request deletion of your data</li>
                    <li>Opt-out of marketing communications</li>
                    <li>Request a copy of your data</li>
                </ul>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">7. Children's Privacy</h2>
                <p class="text-gray-700">
                    Our service is not intended for children under 13 years of age. We do not knowingly collect personal
                    information from children under 13.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">8. Changes to This Policy</h2>
                <p class="text-gray-700">
                    We may update our Privacy Policy from time to time. We will notify you of any changes by posting the
                    new Privacy Policy on this page and updating the "Last updated" date.
                </p>
            </section>

            <section>
                <h2 class="text-2xl font-semibold mb-3">9. Contact Us</h2>
                <p class="text-gray-700">
                    If you have questions about this Privacy Policy, please contact us at:<br>
                    Email: privacy@flagservice.com<br>
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
