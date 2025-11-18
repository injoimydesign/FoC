@extends('layouts.app')

@section('title', 'Checkout - Flag Subscription Service')

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <!-- Left Column - Checkout Form -->
                <div class="lg:col-span-2 space-y-6">

                    @guest
                    <!-- Authentication Section for Guests -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Account</h2>

                        <!-- Auth Tabs -->
                        <div class="flex border-b border-gray-200 mb-6">
                            <button type="button" onclick="switchAuthTab('login')" id="loginTab"
                                    class="flex-1 py-3 px-4 text-center font-medium border-b-2 border-blue-900 text-blue-900 transition">
                                Login
                            </button>
                            <button type="button" onclick="switchAuthTab('register')" id="registerTab"
                                    class="flex-1 py-3 px-4 text-center font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700 transition">
                                Create Account
                            </button>
                        </div>

                        <!-- Login Form -->
                        <div id="loginForm" class="auth-form">
                            <p class="text-gray-600 mb-4 text-sm">Sign in to complete your purchase</p>

                            <form id="loginFormElement" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">Email</label>
                                    <input type="email" name="email" required
                                           placeholder="Enter your email"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">Password</label>
                                    <input type="password" name="password" required
                                           placeholder="Enter your password"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                                <div class="flex items-center">
                                    <label class="flex items-center">
                                        <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-900 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                    </label>
                                </div>
                                <button type="button" onclick="handleLogin()"
                                        class="w-full bg-blue-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
                                    Login & Continue
                                </button>
                            </form>
                        </div>

                        <!-- Register Form -->
                        <div id="registerForm" class="auth-form hidden">
                            <p class="text-gray-600 mb-4 text-sm">Create an account to complete your purchase</p>

                            <form id="registerFormElement" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">Full Name</label>
                                    <input type="text" name="name" required
                                           placeholder="Enter your full name"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">Email</label>
                                    <input type="email" name="email" required
                                           placeholder="Enter your email"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">Password</label>
                                    <input type="password" name="password" required minlength="8"
                                           placeholder="Create a password (min 8 characters)"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">Confirm Password</label>
                                    <input type="password" name="password_confirmation" required minlength="8"
                                           placeholder="Confirm your password"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                                <button type="button" onclick="handleRegister()"
                                        class="w-full bg-blue-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-800 transition">
                                    Create Account & Continue
                                </button>
                            </form>
                        </div>
                    </div>
                    @endguest

                    <!-- Purchase Options -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <div class="flex items-center mb-6">
                            <svg class="w-6 h-6 mr-3 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h2 class="text-2xl font-bold text-gray-900">Purchase Options</h2>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- One-Time Purchase -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="purchase_type" value="one_time" class="peer sr-only" checked>
                                <div class="border-2 border-gray-300 rounded-xl p-6 transition-all hover:border-blue-400 peer-checked:border-blue-900 peer-checked:bg-blue-50">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="text-xl font-bold text-gray-900">One-Time Purchase</h3>
                                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-blue-900 peer-checked:bg-blue-900 flex items-center justify-center mt-1">
                                            <div class="w-2 h-2 rounded-full bg-white hidden peer-checked:block"></div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-4">Pay once for this flag installation</p>
                                    <p class="text-3xl font-bold text-gray-900" id="one-time-price">$0.00</p>
                                </div>
                                <div class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 flex items-center justify-center transition-all peer-checked:border-blue-900 peer-checked:bg-blue-900">
                                    <svg class="w-4 h-4 text-white hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="4"/>
                                    </svg>
                                </div>
                            </label>

                            <!-- Yearly Subscription -->
                            <label class="relative cursor-pointer">
                                <input type="radio" name="purchase_type" value="subscription" class="peer sr-only">
                                <div class="border-2 border-gray-300 rounded-xl p-6 transition-all hover:border-blue-400 peer-checked:border-blue-900 peer-checked:bg-blue-50">
                                    <div class="flex items-start justify-between mb-3">
                                        <h3 class="text-xl font-bold text-gray-900">Yearly Subscription</h3>
                                        <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-blue-900 peer-checked:bg-blue-900 flex items-center justify-center mt-1">
                                            <div class="w-2 h-2 rounded-full bg-white hidden peer-checked:block"></div>
                                        </div>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-4">Automatic seasonal flag changes all year</p>
                                    <p class="text-3xl font-bold text-gray-900" id="subscription-price">$0.00<span class="text-base text-gray-600">/year</span></p>
                                    <p class="text-green-600 text-sm font-medium mt-2">Save 20% vs monthly billing</p>
                                </div>
                                <div class="absolute top-4 right-4 w-6 h-6 rounded-full border-2 flex items-center justify-center transition-all peer-checked:border-blue-900 peer-checked:bg-blue-900">
                                    <svg class="w-4 h-4 text-white hidden peer-checked:block" fill="currentColor" viewBox="0 0 20 20">
                                        <circle cx="10" cy="10" r="4"/>
                                    </svg>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Installation Location -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Installation Location</h2>

                        <form id="checkoutForm" class="space-y-4">
                            @csrf

                            <!-- Street Address -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-2">
                                    Street Address <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="street_address" required
                                       placeholder="Enter your street address"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <!-- City and State -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">
                                        City <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="city" required
                                           placeholder="Enter your city"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">
                                        State <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="state" required
                                           placeholder="Enter your state"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                            </div>

                            <!-- ZIP Code and Neighborhood -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">
                                        ZIP Code <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="zip_code" required
                                           placeholder="Enter your ZIP code"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-900 mb-2">
                                        Neighborhood (optional)
                                    </label>
                                    <input type="text" name="neighborhood"
                                           placeholder="Enter your neighborhood"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                                </div>
                            </div>

                            <!-- Notes -->
                            <div>
                                <label class="block text-sm font-medium text-gray-900 mb-2">
                                    Notes (optional)
                                </label>
                                <textarea name="notes" rows="4"
                                          placeholder="Any special instructions for installation..."
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"></textarea>
                            </div>

                            <!-- Proceed Button -->
                            <button type="button" onclick="proceedToPayment()"
                                    class="w-full bg-blue-900 text-white px-6 py-4 rounded-xl font-semibold text-lg hover:bg-blue-800 transition-all shadow-lg hover:shadow-xl flex items-center justify-center">
                                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                                </svg>
                                Proceed to Payment
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Right Column - Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-200 sticky top-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Order Summary</h2>

                        <!-- Cart Items -->
                        <div id="cart-items-summary" class="space-y-4 mb-6">
                            <!-- Items will be loaded here -->
                        </div>

                        <div id="empty-cart-message" class="text-center py-8 hidden">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            <p class="text-gray-500 mb-4">Your cart is empty</p>
                            <a href="{{ route('flags.index') }}" class="text-blue-900 font-medium hover:underline">
                                Browse Flags →
                            </a>
                        </div>

                        <!-- Pricing Breakdown -->
                        <div id="pricing-breakdown" class="border-t border-gray-200 pt-4 space-y-3">
                            <div class="flex justify-between text-gray-700">
                                <span>Base Price</span>
                                <span id="base-price" class="font-semibold">$0.00</span>
                            </div>
                            <div class="flex justify-between text-gray-700">
                                <span>One-Time Fee</span>
                                <span id="processing-fee" class="font-semibold">+$0.00</span>
                            </div>
                            <div class="flex justify-between text-xl font-bold text-gray-900 pt-3 border-t border-gray-200">
                                <span>Total</span>
                                <span id="total-price">$0.00</span>
                            </div>
                        </div>

                        <!-- Edit Cart Button -->
                        <a href="{{ route('flags.index') }}"
                           class="mt-6 block w-full text-center px-4 py-3 border-2 border-gray-300 rounded-lg font-medium text-gray-700 hover:border-gray-400 hover:bg-gray-50 transition">
                            Edit Cart
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    console.log('=== Checkout Page Loaded ===');

    // Authentication tab switching
    function switchAuthTab(tab) {
        console.log('Switching to tab:', tab);

        // Hide all forms
        document.querySelectorAll('.auth-form').forEach(form => {
            form.classList.add('hidden');
        });

        // Reset all tabs
        document.querySelectorAll('[id$="Tab"]').forEach(tabBtn => {
            tabBtn.classList.remove('border-blue-900', 'text-blue-900');
            tabBtn.classList.add('border-transparent', 'text-gray-500');
        });

        // Show selected form and activate tab
        if (tab === 'login') {
            document.getElementById('loginForm').classList.remove('hidden');
            const loginTab = document.getElementById('loginTab');
            loginTab.classList.add('border-blue-900', 'text-blue-900');
            loginTab.classList.remove('border-transparent', 'text-gray-500');
        } else if (tab === 'register') {
            document.getElementById('registerForm').classList.remove('hidden');
            const registerTab = document.getElementById('registerTab');
            registerTab.classList.add('border-blue-900', 'text-blue-900');
            registerTab.classList.remove('border-transparent', 'text-gray-500');
        }
    }

    // Handle login
    async function handleLogin() {
        console.log('Attempting login...');
        const form = document.getElementById('loginFormElement');
        const formData = new FormData(form);

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        try {
            const response = await fetch('{{ route("login") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
                },
                body: JSON.stringify({
                    email: formData.get('email'),
                    password: formData.get('password'),
                    remember: formData.get('remember') === 'on'
                })
            });

            if (response.ok) {
                console.log('Login successful, reloading page...');
                window.location.reload();
            } else {
                const data = await response.json();
                alert('Login failed: ' + (data.message || 'Invalid credentials'));
            }
        } catch (error) {
            console.error('Login error:', error);
            alert('Login error: ' + error.message);
        }
    }

    // Handle registration
    async function handleRegister() {
        console.log('Attempting registration...');
        const form = document.getElementById('registerFormElement');
        const formData = new FormData(form);

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // Check password confirmation
        if (formData.get('password') !== formData.get('password_confirmation')) {
            alert('Passwords do not match');
            return;
        }

        try {
            const response = await fetch('{{ route("register") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
                },
                body: JSON.stringify({
                    name: formData.get('name'),
                    email: formData.get('email'),
                    password: formData.get('password'),
                    password_confirmation: formData.get('password_confirmation')
                })
            });

            if (response.ok) {
                console.log('Registration successful, reloading page...');
                window.location.reload();
            } else {
                const data = await response.json();
                const errors = data.errors || {};
                const errorMessages = Object.values(errors).flat().join('\n');
                alert('Registration failed:\n' + (errorMessages || data.message || 'Please check your information'));
            }
        } catch (error) {
            console.error('Registration error:', error);
            alert('Registration error: ' + error.message);
        }
    }

    // Load and display cart items in order summary
    function loadCartSummary() {
        console.log('Loading cart summary...');
        const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
        console.log('Cart contents:', cart);

        const cartItemsSummary = document.getElementById('cart-items-summary');
        const emptyCartMessage = document.getElementById('empty-cart-message');
        const pricingBreakdown = document.getElementById('pricing-breakdown');

        if (cart.length === 0) {
            console.log('Cart is empty');
            cartItemsSummary.innerHTML = '';
            emptyCartMessage.classList.remove('hidden');
            pricingBreakdown.classList.add('hidden');
            return;
        }

        console.log('Cart has', cart.length, 'items');
        emptyCartMessage.classList.add('hidden');
        pricingBreakdown.classList.remove('hidden');

        let html = '';
        let subtotal = 0;

        cart.forEach((item) => {
            const basePrice = parseFloat(item.basePrice) || 0;
            const quantity = parseInt(item.quantity) || 1;
            subtotal += basePrice;

            html += `
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-900">${item.flagName}</h4>
                        <p class="text-sm text-gray-600">Qty: ${quantity}</p>
                    </div>
                    <span class="font-semibold text-gray-900">$${basePrice.toFixed(2)}</span>
                </div>
            `;
        });

        cartItemsSummary.innerHTML = html;
        console.log('Base subtotal:', subtotal);
        updatePricing(subtotal);
    }

    // Update pricing based on purchase type
    function updatePricing(baseSubtotal) {
        console.log('Updating pricing with base:', baseSubtotal);

        const purchaseType = document.querySelector('input[name="purchase_type"]:checked').value;
        console.log('Purchase type:', purchaseType);

        let finalPrice = baseSubtotal;
        let displayPrice = baseSubtotal;

        if (purchaseType === 'subscription') {
            finalPrice = baseSubtotal * 12 * 0.8;
            displayPrice = finalPrice;
            console.log('Subscription pricing applied:', finalPrice);
        } else {
            displayPrice = baseSubtotal;
            finalPrice = baseSubtotal;
            console.log('One-time pricing:', finalPrice);
        }

        const processingFee = calculateProcessingFee(finalPrice);
        const total = finalPrice + processingFee;

        console.log('Processing fee:', processingFee);
        console.log('Total:', total);

        document.getElementById('base-price').textContent = '$' + displayPrice.toFixed(2);
        document.getElementById('processing-fee').textContent = '+$' + processingFee.toFixed(2);
        document.getElementById('total-price').textContent = '$' + total.toFixed(2);

        document.getElementById('one-time-price').textContent = '$' + (baseSubtotal + calculateProcessingFee(baseSubtotal)).toFixed(2);
        document.getElementById('subscription-price').textContent = '$' + (finalPrice + processingFee).toFixed(2);
    }

    // Calculate Stripe processing fee
    function calculateProcessingFee(amount) {
        const stripeFeePercent = 0.029;
        const stripeFeeFixed = 0.30;
        return (amount + stripeFeeFixed) / (1 - stripeFeePercent) - amount;
    }

    // Handle purchase type change
    document.querySelectorAll('input[name="purchase_type"]').forEach(radio => {
        radio.addEventListener('change', function() {
            console.log('Purchase type changed to:', this.value);
            const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
            const subtotal = cart.reduce((sum, item) => sum + (parseFloat(item.basePrice) || 0), 0);
            updatePricing(subtotal);
        });
    });

    // Proceed to payment
    async function proceedToPayment() {
        console.log('Proceeding to payment...');

        // Check authentication status
        const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
        console.log('Is authenticated:', isAuthenticated);

        if (!isAuthenticated) {
            alert('Please login or create an account above to complete your purchase.');
            // Scroll to auth section
            document.querySelector('.auth-form').scrollIntoView({ behavior: 'smooth', block: 'start' });
            return;
        }

        const form = document.getElementById('checkoutForm');
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        // Get cart items
        const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
        if (cart.length === 0) {
            alert('Your cart is empty. Please add items before checking out.');
            return;
        }

        // Get form data
        const formData = new FormData(form);
        const purchaseType = document.querySelector('input[name="purchase_type"]:checked').value;

        // Build full address
        const address = `${formData.get('street_address')}, ${formData.get('city')}, ${formData.get('state')} ${formData.get('zip_code')}`;

        // Prepare cart items for API
        const cartItems = cart.map(item => ({
            flag_id: item.flagId,
            quantity: item.quantity,
            base_price: item.basePrice
        }));

        // Build request
        const requestData = {
            name: '{{ auth()->check() ? auth()->user()->name : "" }}',
            email: '{{ auth()->check() ? auth()->user()->email : "" }}',
            address: address,
            purchase_type: purchaseType,
            notes: formData.get('notes') || '',
            cart_items: cartItems
        };

        console.log('Sending payment request:', requestData);

        try {
            const response = await fetch('{{ route("checkout.create-session") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
                },
                body: JSON.stringify(requestData)
            });

            console.log('Response status:', response.status);

            const contentType = response.headers.get('content-type');
            if (!contentType || !contentType.includes('application/json')) {
                console.error('Expected JSON, got:', contentType);
                throw new Error('Server error. Please try refreshing the page.');
            }

            const data = await response.json();
            console.log('Response data:', data);

            if (response.status === 401) {
                alert('Your session has expired. Please login again.');
                window.location.reload();
                return;
            }

            if (!response.ok) {
                throw new Error(data.error || 'Payment failed. Please try again.');
            }

            if (data.url) {
                console.log('Redirecting to Stripe:', data.url);
                localStorage.removeItem('flagCart');
                window.location.href = data.url;
            } else {
                throw new Error('No payment URL received from server.');
            }
        } catch (error) {
            console.error('Payment error:', error);
            alert('Error: ' + error.message + '\n\nPlease refresh the page and try again.');
        }
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM loaded, initializing...');
        loadCartSummary();
    });
</script>
@endpush
@endsection
