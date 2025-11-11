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
            <!-- Checkout Form -->
            <div class="bg-white rounded-lg shadow-lg p-6">
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
                        <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                        <input type="text" name="address" required
                               placeholder="123 Main St, City, State ZIP"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Select Flag Type</label>
                        <select name="flag_id" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Choose a flag...</option>
                            @foreach($flags as $flag)
                                <option value="{{ $flag->id }}" data-price="{{ $flag->base_price }}">
                                    {{ $flag->name }} - ${{ number_format($flag->base_price, 2) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Notes (Optional)</label>
                        <textarea name="notes" rows="3"
                                  placeholder="Any special instructions or notes..."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    </div>

                    <div class="border-t pt-4">
                        <h3 class="text-lg font-semibold mb-4">Payment Options</h3>

                        <div class="space-y-3">
                            <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition">
                                <input type="radio" name="purchase_type" value="one_time" checked
                                       class="w-4 h-4 text-blue-600">
                                <div class="ml-3 flex-1">
                                    <div class="font-semibold">One-Time Payment</div>
                                    <div class="text-sm text-gray-600">Pay once for this flag installation</div>
                                </div>
                            </label>

                            <label class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-blue-500 transition">
                                <input type="radio" name="purchase_type" value="subscription"
                                       class="w-4 h-4 text-blue-600">
                                <div class="ml-3 flex-1">
                                    <div class="font-semibold">Yearly Subscription</div>
                                    <div class="text-sm text-gray-600">Automatic seasonal flag changes all year</div>
                                    <div class="text-sm text-green-600 font-medium mt-1">Save 20% vs monthly billing</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Order Summary -->
            <div>
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-4">
                    <h2 class="text-2xl font-semibold mb-6">Order Summary</h2>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-semibold" id="subtotal">$0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Processing Fee:</span>
                            <span class="font-semibold" id="processingFee">$0.00</span>
                        </div>
                        <div class="border-t pt-3 flex justify-between text-lg">
                            <span class="font-bold">Total:</span>
                            <span class="font-bold text-blue-900" id="total">$0.00</span>
                        </div>
                    </div>

                    <div class="bg-blue-50 p-4 rounded-lg mb-6">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            <div class="text-sm text-gray-700">
                                Secure payment powered by Stripe. Your payment information is encrypted and secure.
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="proceedToPayment()"
                            class="w-full bg-blue-900 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-800 transition">
                        Proceed to Payment
                    </button>

                    <div class="mt-4 text-center text-sm text-gray-600">
                        <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        SSL Secured Payment
                    </div>
                </div>
            </div>
        </div>
        </div><!-- end checkout-form-section -->
    </div>
</div>

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
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
        const processingFee = calculateProcessingFee(subtotal);
        const total = subtotal + processingFee;

        document.getElementById('subtotal').textContent = '$' + subtotal.toFixed(2);
        document.getElementById('processingFee').textContent = '$' + processingFee.toFixed(2);
        document.getElementById('total').textContent = '$' + total.toFixed(2);
    }

    function updateCartCount() {
        const cart = JSON.parse(localStorage.getItem('flagCart') || '[]');
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);

        const badge = document.getElementById('cart-count');
        if (badge) {
            badge.textContent = totalItems;
            badge.style.display = totalItems > 0 ? 'block' : 'none';
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
    });

    // Update price display (keep existing functionality)
    document.querySelector('select[name="flag_id"]').addEventListener('change', function() {
        const price = parseFloat(this.options[this.selectedIndex].dataset.price || 0);
        const processingFee = calculateProcessingFee(price);
        const total = price + processingFee;

        document.getElementById('subtotal').textContent = '$' + price.toFixed(2);
        document.getElementById('processingFee').textContent = '$' + processingFee.toFixed(2);
        document.getElementById('total').textContent = '$' + total.toFixed(2);
    });

    // Proceed to payment
    async function proceedToPayment() {
        const form = document.getElementById('checkoutForm');
        const formData = new FormData(form);

        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        try {
            const response = await fetch('{{ route("checkout.create-session") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('[name="_token"]').value
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            const data = await response.json();

            if (data.url) {
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
