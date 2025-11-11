@extends('layouts.app')

@section('title', 'Home - Flag Subscription Service')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                Professional Flag Service for Patriots
            </h1>
            <p class="text-xl md:text-2xl mb-8 text-gray-200">
                Never miss a patriotic holiday with our professional flag installation and removal service
            </p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('flags.index') }}"
                   class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-lg font-medium transition">
                    Browse Flags
                </a>
                <a href="{{ route('about') }}"
                   class="bg-white text-blue-900 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium transition">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">How It Works</h2>
            <p class="text-gray-600">Simple, professional, hassle-free flag service</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            <div class="text-center">
                <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    1
                </div>
                <h3 class="text-xl font-semibold mb-2">Choose Your Flags</h3>
                <p class="text-gray-600">Select from our collection of US flags and military branch flags</p>
            </div>

            <div class="text-center">
                <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    2
                </div>
                <h3 class="text-xl font-semibold mb-2">We Install & Remove</h3>
                <p class="text-gray-600">Our team professionally installs and removes your flags for each holiday</p>
            </div>

            <div class="text-center">
                <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    3
                </div>
                <h3 class="text-xl font-semibold mb-2">Enjoy Your Display</h3>
                <p class="text-gray-600">Show your patriotism without any of the hassle</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Flags Section -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">Our Flag Selection</h2>
            <p class="text-gray-600">Choose from US flags and military branch flags</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($featuredFlags as $flag)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                    <img src="{{ $flag->image_url }}" alt="{{ $flag->name }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">{{ $flag->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $flag->description }}</p>
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-2xl font-bold text-blue-900">${{ number_format($flag->base_price, 2) }}</span>
                            </div>
                            <button onclick="addToCart({{ $flag->id }}, '{{ addslashes($flag->name) }}', {{ $flag->base_price }})"
                                    class="w-full bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 transition font-medium">
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

        <div class="text-center mt-8">
            <a href="{{ route('flags.index') }}"
               class="inline-block bg-blue-900 text-white px-8 py-3 rounded-lg font-medium hover:bg-blue-800 transition">
                View All Flags
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-blue-900 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Display Your Patriotism?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-200">
            Join our flag service today and have professional flag displays at your home or business
            for all five patriotic holidays this year.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-10">
            <a href="{{ route('register') }}"
               class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-lg font-medium transition">
                Sign Up Now
            </a>
            <a href="{{ route('contact') }}"
               class="bg-white text-blue-900 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium transition">
                Contact Us
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 max-w-4xl mx-auto">
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="text-4xl font-bold text-red-400 mb-2">5</div>
                <div class="text-sm">Patriotic Holidays</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="text-4xl font-bold text-red-400 mb-2">100%</div>
                <div class="text-sm">Professional Installation</div>
            </div>
            <div class="bg-white/10 backdrop-blur-sm p-6 rounded-lg">
                <div class="text-4xl font-bold text-red-400 mb-2">1000+</div>
                <div class="text-sm">Satisfied Customers</div>
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
