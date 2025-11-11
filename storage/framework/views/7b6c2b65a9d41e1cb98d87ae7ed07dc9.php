<?php $__env->startSection('title', 'Home - Professional Flag Display Service'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="relative overflow-hidden bg-gradient-to-b from-blue-900 to-blue-700 text-white">
    <div class="absolute inset-0 opacity-20">
        <img src="https://images.unsplash.com/photo-1593352216840-1aee13f45818?q=80&w=1974&auto=format&fit=crop"
             alt="American Flag" class="w-full h-full object-cover">
    </div>

    <div class="relative container mx-auto px-4 py-24">
        <div class="max-w-3xl">
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                Show Your Patriotism with Professional Flag Displays
            </h1>
            <p class="text-xl mb-8 text-gray-200">
                Subscribe to have American flags professionally installed at your home or business
                for 5 patriotic holidays throughout the year.
            </p>

            <?php if($nextEvent): ?>
                <div class="bg-white/10 backdrop-blur-sm p-4 rounded-lg inline-block mb-8">
                    <p class="font-medium">
                        Next flag placement: <span class="font-bold text-red-400"><?php echo e($nextEvent->name); ?></span>
                        on <?php echo e($nextEvent->date->format('F j, Y')); ?>

                    </p>
                </div>
            <?php endif; ?>

            <div class="flex flex-col sm:flex-row gap-4">
                <a href="<?php echo e(route('services')); ?>"
                   class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-lg font-medium text-center transition">
                    View Our Services
                </a>
                <a href="<?php echo e(route('register')); ?>"
                   class="bg-white text-blue-900 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium text-center transition">
                    Sign Up Now
                </a>
            </div>
        </div>
    </div>
</div>

<!-- How It Works Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold mb-4">How Our Service Works</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                A simple process to show your patriotism on important national holidays
                with professionally maintained flag displays.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 mx-auto rounded-full bg-blue-900 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Sign Up & Select Flags</h3>
                <p class="text-gray-600">
                    Create an account, choose your preferred American or military flags, and enter your location details.
                </p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 mx-auto rounded-full bg-blue-900 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">We Record Your Location</h3>
                <p class="text-gray-600">
                    Our team maps your address and adds it to our service routes for the upcoming patriotic holidays.
                </p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 mx-auto rounded-full bg-blue-900 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Flag Installation on Key Dates</h3>
                <p class="text-gray-600">
                    We arrive at your location on 5 important holidays throughout the year to set up your flag display.
                </p>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 mx-auto rounded-full bg-blue-900 flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Maintained & Removed</h3>
                <p class="text-gray-600">
                    Your flags are professionally installed, maintained during display, and removed after the holiday.
                </p>
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
            <?php $__currentLoopData = $featuredFlags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition">
                    <img src="<?php echo e($flag->image_url); ?>" alt="<?php echo e($flag->name); ?>" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2"><?php echo e($flag->name); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo e($flag->description); ?></p>
                        <div class="flex flex-col gap-2">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-2xl font-bold text-blue-900">$<?php echo e(number_format($flag->base_price, 2)); ?></span>
                            </div>
                            <button onclick="addToCart(<?php echo e($flag->id); ?>, '<?php echo e($flag->name); ?>')"
                                    class="w-full bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-800 transition font-medium">
                                Add to Cart
                            </button>
                            <a href="<?php echo e(route('flags.show', $flag)); ?>"
                               class="block text-center text-blue-900 hover:text-blue-700 text-sm font-medium">
                                Learn More →
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="text-center mt-8">
            <a href="<?php echo e(route('flags.index')); ?>"
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
            <a href="<?php echo e(route('register')); ?>"
               class="bg-red-600 hover:bg-red-700 px-8 py-3 rounded-lg font-medium transition">
                Sign Up Now
            </a>
            <a href="<?php echo e(route('contact')); ?>"
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Simple cart functionality using localStorage
    function addToCart(flagId, flagName) {
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/xavierporter/Sites/localhost-new/FoC/resources/views/home.blade.php ENDPATH**/ ?>