@extends('layouts.app')

@section('title', 'Checkout - Flag Subscription Service')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-8">Checkout</h1>

        <!-- Cart Items Display -->
        <div id="cart-items-section" class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Your Cart</h2>
            <div id="cart-items-list"></div>
            <div id="empty-cart" class="text-center py-8 hidden">
                <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-gray-600 mb-4">Your cart is empty</p>
                <a href="{{ route('flags.index') }}" class="text-blue-900 font-medium hover:underline">
                    Browse Flags →
                </a>
            </div>
        </div>

        <div id="checkout-form-section">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Checkout Form / Login Section -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                @guest
                    <!-- Guest View: Login/Register Tabs -->
                    <div class="mb-6">
                        <div class="flex border-b border-gray-200">
                            <button type="button" onclick="switchAuthTab('login')" id="loginTab"
                                    class="flex-1 py-3 px-4 text-center font-medium border-b-2 border-blue-900 text-blue-900">
                                Login
                            </button>
                            <button type="button" onclick="switchAuthTab('register')" id="registerTab"
                                    class="flex-1 py-3 px-4 text-center font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                                Create Account
                            </button>
                            <button type="button" onclick="switchAuthTab('guest')" id="guestTab"
                                    class="flex-1 py-3 px-4 text-center font-medium border-b-2 border-transparent text-gray-500 hover:text-gray-700">
                                Guest Checkout
                            </button>
                        </div>
                    </div>

                    <!-- Login Form -->
                    <div id="loginForm" class="auth-form">
                        <h2 class="text-2xl font-semibold mb-4">Login to Your Account</h2>
                        <p class="text-gray-600 mb-6">Login to proceed with your order faster</p>

                        <form id="loginFormElement" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <input type="password" name="password" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-blue-900 focus:ring-blue-500">
                                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                                </label>
                                <a href="{{ route('password.request') }}" class="text-sm text-blue-900 hover:underline">Forgot password?</a>
                            </div>
                            <button type="button" onclick="handleLogin()"
                                    class="w-full bg-blue-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-800 transition">
                                Login & Continue
                            </button>
                        </form>
                    </div>

                    <!-- Register Form -->
                    <div id="registerForm" class="auth-form hidden">
                        <h2 class="text-2xl font-semibold mb-4">Create Your Account</h2>
                        <p class="text-gray-600 mb-6">Sign up to save your order details and track your subscriptions</p>

                        <form id="registerFormElement" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="name" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <input type="password" name="password" required minlength="8"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password</label>
                                <input type="password" name="password_confirmation" required minlength="8"
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <button type="button" onclick="handleRegister()"
                                    class="w-full bg-blue-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-800 transition">
                                Create Account & Continue
                            </button>
                        </form>
                    </div>

                    <!-- Guest Checkout Form -->
                    <div id="guestForm" class="auth-form hidden">
                        <h2 class="text-2xl font-semibold mb-4">Guest Checkout</h2>
                        <p class="text-gray-600 mb-6">Complete your purchase without creating an account</p>

                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <div class="text-sm text-yellow-800">
                                    <p class="font-semibold mb-1">Note:</p>
                                    <p>Guest checkout requires creating an account after payment to manage your subscription.</p>
                                </div>
                            </div>
                        </div>

                        <form id="guestCheckoutForm" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                <input type="text" name="name" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Installation Address</label>
                                <textarea name="address" required rows="3"
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Purchase Type</label>
                                <select name="purchase_type" required
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="one_time">One-Time Purchase</option>
                                    <option value="subscription">Yearly Subscription (20% off)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Additional Notes (Optional)</label>
                                <textarea name="notes" rows="3"
                                          placeholder="Any special instructions or notes..."
                                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                            </div>
                        </form>
                    </div>
                @else
                    <!-- Authenticated User View -->
                    <h2 class="text-2xl font-semibold mb-6">Customer Information</h2>

                    <form id="checkoutForm" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" name="name" required
                                   value="{{ auth()->user()->name }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" name="email" required
                                   value="{{ auth()->user()->email }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Installation Address</label>
                            <textarea name="address" required rows="3"
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Purchase Type</label>
                            <select name="purchase_type" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="one_time">One-Time Purchase</option>
                                <option value="subscription">Yearly Subscription (20% off)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Additional Notes (Optional)</label>
                            <textarea name="notes" rows="3"
                                      placeholder="Any special instructions or notes..."
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                    </form>
                @endguest
            </div>

            <!-- Order Summary -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-2xl font-semibold mb-6">Order Summary</h2>

                <div class="space-y-4 mb-6">
                    <div class="flex justify-between text-gray-700">
                        <span>Subtotal:</span>
                        <span id="subtotal" class="font-semibold">$0.00</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Processing Fee:</span>
                        <span id="processingFee" class="font-semibold">$0.00</span>
                    </div>
                    <div class="border-t pt-4">
                        <div class="flex justify-between text-xl font-bold">
                            <span>Total:</span>
                            <span id="total">$0.00</span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div class="text-sm text-blue-800">
                            Your payment information is encrypted and secure.
                        </div>
                    </div>
                </div>

                @auth
                    <button type="button" onclick="proceedToPayment()"
                            class="w-full bg-blue-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-800 transition">
                        Proceed to Payment
                    </button>
                @else
                    <button type="button" onclick="proceedToPayment()"
                            class="w-full bg-blue-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-800 transition">
                        Continue to Payment
                    </button>
                    <p class="text-sm text-gray-600 text-center mt-3">
                        Complete the form on the left to continue
                    </p>
                @endauth

                <div class="mt-4 text-center text-sm text-gray-600">
                    <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    SSL Secured Payment
                </div>
            </div>
        </div>
        </div><!-- end checkout-form-section -->
    </div>
</div>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Authentication tab switching
    function switchAuthTab(tab) {
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
            document.getElementById('loginTab').classList.add('border-blue-900', 'text-blue-900');
            document.getElementById('loginTab').classList.remove('border-transparent', 'text-gray-500');
        } else if (tab === 'register') {
            document.getElementById('registerForm').classList.remove('hidden');
            document.getElementById('registerTab').classList.add('border-blue-900', 'text-blue-900');
            document.getElementById('registerTab').classList.remove('border-transparent', 'text-gray-500');
        } else if (tab === 'guest') {
            document.getElementById('guestForm').classList.remove('hidden');
            document.getElementById('guestTab').classList.add('border-blue-900', 'text-blue-900');
            document.getElementById('guestTab').classList.remove('border-transparent', 'text-gray-500');
        }
    }

    // Handle login
    async function handleLogin() {
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
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
                },
                body: JSON.stringify({
                    email: formData.get('email'),
                    password: formData.get('password'),
                    remember: formData.get('remember') === 'on'
                })
            });

            if (response.ok) {
                // Login successful, reload page to show authenticated view
                window.location.reload();
            } else {
                const data = await response.json();
                alert('Login failed: ' + (data.message || 'Invalid credentials'));
            }
        } catch (error) {
            alert('Login error: ' + error.message);
        }
    }

    // Handle registration
    async function handleRegister() {
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
                // Registration successful, reload page to show authenticated view
                window.location.reload();
            } else {
                const data = await response.json();
                const errors = data.errors || {};
                const errorMessages = Object.values(errors).flat().join('\n');
                alert('Registration failed:\n' + (errorMessages || data.message || 'Please check your information'));
            }
        } catch (error) {
            alert('Registration error: ' + error.message);
        }
    }

    // Load and display cart items
    function loadCartItems() {
        const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
        const cartItemsList = document.getElementById('cart-items-list');
        const emptyCart = document.getElementById('empty-cart');
        const checkoutFormSection = document.getElementById('checkout-form-section');

        if (cart.length === 0) {
            emptyCart.classList.remove('hidden');
            checkoutFormSection.style.display = 'none';
            return;
        }

        emptyCart.classList.add('hidden');
        checkoutFormSection.style.display = 'block';

        let html = '<div class="space-y-3">';
        let subtotal = 0;

        cart.forEach((item, index) => {
            const itemTotal = item.basePrice * item.quantity;
            subtotal += itemTotal;

            html += `
                <div class="flex items-center justify-between border-b pb-3">
                    <div class="flex-1">
                        <h3 class="font-semibold">${item.flagName}</h3>
                        <p class="text-sm text-gray-600">$${item.basePrice.toFixed(2)} × ${item.quantity}</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <span class="font-semibold">$${itemTotal.toFixed(2)}</span>
                        <button onclick="removeFromCart(${index})" class="text-red-600 hover:text-red-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `;
        });

        html += '</div>';
        cartItemsList.innerHTML = html;

        // Update order summary
        updateOrderSummary(subtotal);
    }

    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
        cart.splice(index, 1);
        localStorage.setItem('flagCart', JSON.stringify(cart));
        loadCartItems();
        updateCartCount();
    }

    function updateOrderSummary(subtotal) {
        // Get purchase type from the appropriate form
        let purchaseType = 'one_time';
        const checkoutForm = document.getElementById('checkoutForm');
        const guestForm = document.getElementById('guestCheckoutForm');

        if (checkoutForm && checkoutForm.querySelector('select[name="purchase_type"]')) {
            purchaseType = checkoutForm.querySelector('select[name="purchase_type"]').value;
        } else if (guestForm && guestForm.querySelector('select[name="purchase_type"]')) {
            purchaseType = guestForm.querySelector('select[name="purchase_type"]').value;
        }

        let finalSubtotal = subtotal;

        // Apply 20% discount for subscriptions
        if (purchaseType === 'subscription') {
            finalSubtotal = subtotal * 12 * 0.8; // Yearly price with discount
        }

        const processingFee = calculateProcessingFee(finalSubtotal);
        const total = finalSubtotal + processingFee;

        document.getElementById('subtotal').textContent = '$' + finalSubtotal.toFixed(2);
        document.getElementById('processingFee').textContent = '$' + processingFee.toFixed(2);
        document.getElementById('total').textContent = '$' + total.toFixed(2);
    }

    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

        const badge = document.getElementById('cart-count');
        if (badge) {
            badge.textContent = totalItems;
            badge.style.display = totalItems > 0 ? 'flex' : 'none';
        }
    }

    // Calculate processing fee
    function calculateProcessingFee(amount) {
        const stripeFeePercent = 0.029;
        const stripeFeeFixed = 0.30;
        return (amount + stripeFeeFixed) / (1 - stripeFeePercent) - amount;
    }

    // Load cart on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadCartItems();

        // Update order summary when purchase type changes (for both forms)
        const checkoutForm = document.getElementById('checkoutForm');
        const guestForm = document.getElementById('guestCheckoutForm');

        if (checkoutForm && checkoutForm.querySelector('select[name="purchase_type"]')) {
            checkoutForm.querySelector('select[name="purchase_type"]').addEventListener('change', function() {
                const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
                const subtotal = cart.reduce((sum, item) => sum + (item.basePrice * item.quantity), 0);
                updateOrderSummary(subtotal);
            });
        }

        if (guestForm && guestForm.querySelector('select[name="purchase_type"]')) {
            guestForm.querySelector('select[name="purchase_type"]').addEventListener('change', function() {
                const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
                const subtotal = cart.reduce((sum, item) => sum + (item.basePrice * item.quantity), 0);
                updateOrderSummary(subtotal);
            });
        }
    });

    // Proceed to payment (authenticated users and guest checkout)
    async function proceedToPayment() {
        // Get the appropriate form based on auth status
        const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
        let form, formData;

        if (isAuthenticated) {
            form = document.getElementById('checkoutForm');
            formData = new FormData(form);
        } else {
            form = document.getElementById('guestCheckoutForm');
            formData = new FormData(form);
        }

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

        // Prepare cart items for API
        const cartItems = cart.map(item => ({
            flag_id: item.flagId,
            quantity: item.quantity,
            base_price: item.basePrice
        }));

        // Build request body
        const requestData = {
            name: formData.get('name'),
            email: formData.get('email'),
            address: formData.get('address'),
            purchase_type: formData.get('purchase_type'),
            notes: formData.get('notes'),
            cart_items: cartItems
        };

        try {
            const response = await fetch('{{ route("checkout.create-session") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
                },
                body: JSON.stringify(requestData)
            });

            const data = await response.json();

            if (response.status === 401) {
                // Not authenticated, show message
                alert('Please login or create an account to continue.');
                switchAuthTab('login');
                return;
            }

            if (data.url) {
                // Clear cart and redirect to Stripe
                localStorage.removeItem('flagCart');
                updateCartCount();
                window.location.href = data.url;
            } else {
                alert('Error: ' + (data.error || 'Unknown error occurred'));
            }
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }
</script>
@endpush
@endsection
