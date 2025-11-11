@extends('layouts.app')

@section('title', 'FAQ - Flag Subscription Service')

@section('content')
<div class="bg-gradient-to-br from-blue-900 to-blue-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Frequently Asked Questions</h1>
        <p class="text-xl text-gray-200">Find answers to common questions about our service</p>
    </div>
</div>

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto space-y-6">
            <!-- FAQ Item -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">What holidays do you service?</h3>
                <p class="text-gray-700">
                    We provide flag installation for five major patriotic holidays: Memorial Day, Flag Day,
                    Independence Day, Labor Day, and Veterans Day.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">How does the service work?</h3>
                <p class="text-gray-700">
                    Our team arrives on the morning of the holiday to professionally install your flag.
                    We maintain it during the display period and remove it after the holiday. All flags are
                    stored safely until the next holiday.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">What's the difference between one-time and subscription service?</h3>
                <p class="text-gray-700">
                    One-time service covers a single holiday of your choice ($45-50). Our yearly subscription
                    covers all 5 holidays and saves you 20% compared to paying for each holiday separately.
                    Subscriptions also guarantee priority scheduling.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">What types of flags do you offer?</h3>
                <p class="text-gray-700">
                    We offer premium American flags ($45) and military branch flags for Army, Navy, Air Force,
                    and Marines ($50 each). All flags are 3' x 5' and made from weather-resistant materials.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">Do I need to be home for installation?</h3>
                <p class="text-gray-700">
                    No! We install flags in your yard, and you don't need to be present. We'll note your
                    preferred location during signup and handle everything professionally.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">What if there's bad weather?</h3>
                <p class="text-gray-700">
                    Our flags are weather-resistant and designed to withstand typical weather conditions.
                    In case of severe weather, we'll secure or temporarily remove flags to prevent damage,
                    then reinstall when conditions improve.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">Can I cancel my subscription?</h3>
                <p class="text-gray-700">
                    Yes, you can cancel your subscription at any time. For yearly subscriptions, cancellation
                    takes effect at the end of your current billing period. No refunds for holidays already serviced.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">Do you service businesses and HOAs?</h3>
                <p class="text-gray-700">
                    Absolutely! We service residential homes, businesses, HOA communities, and commercial properties.
                    Contact us for special pricing on multiple locations.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">What's included in the price?</h3>
                <p class="text-gray-700">
                    Your price includes the premium flag, professional installation, maintenance during display,
                    removal after the holiday, and safe storage between events. There are no hidden fees.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">How far in advance should I sign up?</h3>
                <p class="text-gray-700">
                    We recommend signing up at least 2 weeks before the holiday to guarantee availability.
                    However, we accept last-minute orders when possible, subject to route capacity.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">What payment methods do you accept?</h3>
                <p class="text-gray-700">
                    We accept all major credit cards through our secure Stripe payment system.
                    Payment is processed at checkout for one-time services or at the start of your subscription year.
                </p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-xl font-semibold mb-3">What if I move to a new address?</h3>
                <p class="text-gray-700">
                    Simply update your address in your account dashboard. If you move out of our service area,
                    we'll work with you to transfer or cancel your subscription.
                </p>
            </div>
        </div>

        <!-- Still Have Questions -->
        <div class="max-w-4xl mx-auto mt-12 text-center">
            <div class="bg-blue-50 rounded-lg p-8">
                <h2 class="text-2xl font-bold mb-4">Still Have Questions?</h2>
                <p class="text-gray-700 mb-6">
                    Can't find the answer you're looking for? Our customer service team is here to help.
                </p>
                <a href="{{ route('contact') }}"
                   class="inline-block bg-blue-900 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-800 transition">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
