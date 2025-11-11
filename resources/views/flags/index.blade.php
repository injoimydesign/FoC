@extends('layouts.app')

@section('title', 'Browse Flags - Flag Subscription Service')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Flag Selection</h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                Choose from premium American flags and military branch flags for your home or business.
            </p>
        </div>

        <!-- Filter Tabs -->
        <div class="flex justify-center space-x-4 mb-8">
            <a href="{{ route('flags.index') }}"
               class="px-6 py-3 rounded-lg font-medium {{ request()->is('flags') ? 'bg-blue-900 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition">
                All Flags
            </a>
            <a href="{{ route('flags.us') }}"
               class="px-6 py-3 rounded-lg font-medium {{ request()->is('flags/us-flags') ? 'bg-blue-900 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition">
                US Flags
            </a>
            <a href="{{ route('flags.military') }}"
               class="px-6 py-3 rounded-lg font-medium {{ request()->is('flags/military-flags') ? 'bg-blue-900 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} transition">
                Military Flags
            </a>
        </div>

        <!-- Flags Grid -->
        @if($flags->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($flags as $flag)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Flag Image -->
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-red-100 flex items-center justify-center overflow-hidden">
                            <img src="{{ $flag->image_url }}"
                                 alt="{{ $flag->name }}"
                                 class="h-full w-full object-contain p-4">
                        </div>

                        <!-- Flag Details -->
                        <div class="p-6">
                            <!-- Flag Type Badge -->
                            @if($flag->flag_type === 'military_flag')
                                <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full mb-2">
                                    {{ $flag->military_branch }}
                                </span>
                            @else
                                <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full mb-2">
                                    US Flag
                                </span>
                            @endif

                            <!-- Flag Name -->
                            <h3 class="text-xl font-bold mb-2 text-gray-900">{{ $flag->name }}</h3>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">
                                {{ $flag->description }}
                            </p>

                            <!-- Price and Action -->
                            <div class="flex flex-col gap-2 mt-4 pt-4 border-t">
                                <div class="flex justify-between items-center mb-2">
                                    <div>
                                        <span class="text-2xl font-bold text-blue-900">
                                            ${{ number_format($flag->base_price, 2) }}
                                        </span>
                                        <span class="text-gray-500 text-sm block">Base Price</span>
                                    </div>
                                </div>
                                <button onclick="addToCart({{ $flag->id }}, '{{ $flag->name }}', {{ $flag->base_price }})"
                                        class="w-full bg-blue-900 text-white px-6 py-2 rounded-lg font-medium hover:bg-blue-800 transition">
                                    Add to Cart
                                </button>
                                <a href="{{ route('flags.show', $flag) }}"
                                   class="block text-center text-blue-900 hover:text-blue-700 text-sm font-medium">
                                    Learn More →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <svg class="w-24 h-24 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-semibold text-gray-600 mb-2">No Flags Available</h3>
                <p class="text-gray-500">Check back soon for new flag options!</p>
            </div>
        @endif
    </div>
</div>

<!-- Info Section -->
<section class="bg-blue-50 py-16 mt-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-6">Why Choose Our Flag Service?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-8">
                <div>
                    <div class="bg-blue-900 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">High Quality</h3>
                    <p class="text-gray-600 text-sm">Premium, weather-resistant flags that last</p>
                </div>
                <div>
                    <div class="bg-blue-900 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">Best Value</h3>
                    <p class="text-gray-600 text-sm">Competitive pricing with subscription discounts</p>
                </div>
                <div>
                    <div class="bg-blue-900 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-semibold mb-2">Professional Service</h3>
                    <p class="text-gray-600 text-sm">Expert installation and maintenance</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Simple cart functionality using localStorage
    function addToCart(flagId, flagName, basePrice) {
        // Get existing cart or initialize empty array
        let cart = JSON.parse(localStorage.getItem('flagCart') || '[]');

        // Check if flag already in cart
        const existingItem = cart.find(item => item.flagId === flagId);

        if (existingItem) {
            // Increment quantity
            existingItem.quantity += 1;
        } else {
            // Add new item
            cart.push({
                flagId: flagId,
                flagName: flagName,
                basePrice: basePrice,
                quantity: 1
            });
        }

        // Save to localStorage
        localStorage.setItem('flagCart', JSON.stringify(cart));

        // Show success message
        showCartNotification(flagName);

        // Update cart count if badge exists
        updateCartCount();
    }

    function showCartNotification(flagName) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 animate-fade-in';
        notification.innerHTML = `
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span><strong>${flagName}</strong> added to cart!</span>
            </div>
        `;

        document.body.appendChild(notification);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.remove();
        }, 3000);
    }

    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

        // Update badge if it exists
        const badge = document.getElementById('cart-count');
        if (badge) {
            badge.textContent = totalItems;
            badge.style.display = totalItems > 0 ? 'block' : 'none';
        }
    }

    // Update cart count on page load
    document.addEventListener('DOMContentLoaded', updateCartCount);
</script>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.3s ease-out;
    }
</style>
@endpush
