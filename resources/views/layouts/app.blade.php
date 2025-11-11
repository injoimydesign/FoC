<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Flag Subscription Service')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @stack('styles')
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-blue-900 text-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-xl font-bold">
                        🇺🇸 Flag Service
                    </a>
                    <div class="hidden md:flex space-x-6">
                        <a href="{{ route('home') }}" class="hover:text-red-400 transition">Home</a>
                        <a href="{{ route('services') }}" class="hover:text-red-400 transition">Services</a>
                        <a href="{{ route('flags.index') }}" class="hover:text-red-400 transition">Flags</a>
                        <a href="{{ route('pricing') }}" class="hover:text-red-400 transition">Pricing</a>
                        <a href="{{ route('about') }}" class="hover:text-red-400 transition">About</a>
                        <a href="{{ route('contact') }}" class="hover:text-red-400 transition">Contact</a>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="hover:text-red-400 transition">Dashboard</a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="hover:text-red-400 transition">Admin</a>
                        @endif

                        <!-- Cart Icon with Badge -->
                        <a href="{{ route('checkout.index') }}" class="relative hover:text-red-400 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span id="cart-count" class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center" style="display: none;">0</span>
                        </a>

                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="hover:text-red-400 transition">Logout</button>
                        </form>
                    @else
                        <!-- Cart Icon for guests -->
                        <a href="{{ route('login') }}" class="relative hover:text-red-400 transition" title="Login to checkout">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <span id="cart-count" class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center" style="display: none;">0</span>
                        </a>

                        <a href="{{ route('login') }}" class="hover:text-red-400 transition">Login</a>
                        <a href="{{ route('register') }}" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded transition">
                            Sign Up
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-4 mt-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 mt-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4">About Us</h3>
                    <p class="text-gray-300 text-sm">
                        Professional flag installation service for patriotic holidays throughout the year.
                    </p>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('services') }}" class="text-gray-300 hover:text-red-400">Flag Subscription</a></li>
                        <li><a href="{{ route('flags.index') }}" class="text-gray-300 hover:text-red-400">Our Flags</a></li>
                        <li><a href="{{ route('pricing') }}" class="text-gray-300 hover:text-red-400">Pricing</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Company</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-red-400">About Us</a></li>
                        <li><a href="{{ route('faq') }}" class="text-gray-300 hover:text-red-400">FAQ</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-300 hover:text-red-400">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <p class="text-gray-300 text-sm">
                        Email: info@flagservice.com<br>
                        Phone: (555) 123-4567
                    </p>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-300 text-sm">
                <p>&copy; {{ date('Y') }} Flag Service. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Update cart count on page load
        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

            const badge = document.getElementById('cart-count');
            if (badge) {
                badge.textContent = totalItems;
                badge.style.display = totalItems > 0 ? 'block' : 'none';
            }
        }

        // Run on page load
        document.addEventListener('DOMContentLoaded', updateCartCount);

        // Also update when page becomes visible (tab switching)
        document.addEventListener('visibilitychange', function() {
            if (!document.hidden) {
                updateCartCount();
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
