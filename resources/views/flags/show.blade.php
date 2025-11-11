@extends('layouts.app')

@section('title', $flag->name . ' - Flag Subscription Service')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-6xl mx-auto">
        <!-- Breadcrumb -->
        <nav class="mb-8 text-sm">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-800">Home</a>
            <span class="mx-2 text-gray-400">/</span>
            <a href="{{ route('flags.index') }}" class="text-blue-600 hover:text-blue-800">Flags</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-600">{{ $flag->name }}</span>
        </nav>

        <!-- Flag Details -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Flag Image -->
            <div class="bg-gradient-to-br from-blue-50 to-red-50 rounded-lg p-8 flex items-center justify-center">
                <img src="{{ $flag->image_url }}"
                     alt="{{ $flag->name }}"
                     class="max-w-full max-h-96 object-contain">
            </div>

            <!-- Flag Information -->
            <div>
                <!-- Flag Type Badge -->
                @if($flag->flag_type === 'military_flag')
                    <span class="inline-block bg-green-100 text-green-800 text-sm font-semibold px-4 py-1 rounded-full mb-4">
                        {{ $flag->military_branch }} Branch
                    </span>
                @else
                    <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-4 py-1 rounded-full mb-4">
                        United States Flag
                    </span>
                @endif

                <!-- Flag Name -->
                <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $flag->name }}</h1>

                <!-- Description -->
                <p class="text-gray-600 text-lg mb-6">
                    {{ $flag->description }}
                </p>

                <!-- Pricing -->
                <div class="bg-blue-50 rounded-lg p-6 mb-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-1">Base Price</h3>
                            <p class="text-3xl font-bold text-blue-900">${{ number_format($flag->base_price, 2) }}</p>
                        </div>
                        @if(isset($discountedPrice) && $discountedPrice < $flag->base_price)
                            <div class="text-right">
                                <h3 class="text-lg font-semibold text-gray-900 mb-1">Current Price</h3>
                                <p class="text-3xl font-bold text-green-600">${{ number_format($discountedPrice, 2) }}</p>
                                <span class="text-sm text-green-600 font-medium">
                                    Save ${{ number_format($flag->base_price - $discountedPrice, 2) }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <p class="text-sm text-gray-600">
                        * Price includes professional installation and removal for one patriotic holiday.
                    </p>
                </div>

                <!-- Features -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold mb-4">What's Included</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">High-quality, weather-resistant flag (3' x 5')</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Professional installation and placement</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Flag maintenance during display period</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">Removal and storage after holiday</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span class="text-gray-700">100% satisfaction guarantee</span>
                        </li>
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-3">
                    @auth
                        <a href="{{ route('checkout.index', ['flag_id' => $flag->id]) }}"
                           class="block w-full bg-blue-900 text-white text-center px-8 py-4 rounded-lg font-semibold hover:bg-blue-800 transition">
                            Order This Flag
                        </a>
                    @else
                        <a href="{{ route('register') }}"
                           class="block w-full bg-blue-900 text-white text-center px-8 py-4 rounded-lg font-semibold hover:bg-blue-800 transition">
                            Sign Up to Order
                        </a>
                    @endauth

                    <a href="{{ route('flags.index') }}"
                       class="block w-full bg-gray-200 text-gray-800 text-center px-8 py-4 rounded-lg font-semibold hover:bg-gray-300 transition">
                        Browse All Flags
                    </a>
                </div>
            </div>
        </div>

        <!-- Additional Information -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-blue-900 mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">5 Patriotic Holidays</h3>
                <p class="text-gray-600">
                    Subscribe for yearly service and display your flag on all 5 major patriotic holidays with 20% savings.
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-blue-900 mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Quality Guarantee</h3>
                <p class="text-gray-600">
                    All our flags are made from premium, weather-resistant materials with reinforced stitching.
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-blue-900 mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Professional Service</h3>
                <p class="text-gray-600">
                    Our trained team handles all installation, maintenance, and removal with care and respect.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
