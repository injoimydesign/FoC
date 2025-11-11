<?php $__env->startSection('title', 'About Us - Flag Subscription Service'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero -->
<div class="bg-gradient-to-br from-blue-900 to-blue-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">About Our Flag Service</h1>
        <p class="text-xl text-gray-200 max-w-2xl mx-auto">
            Proudly serving communities with professional flag installation since 2020
        </p>
    </div>
</div>

<!-- Our Story -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-bold mb-6 text-center">Our Story</h2>
            <div class="prose prose-lg max-w-none text-gray-700">
                <p class="text-lg leading-relaxed mb-4">
                    We started with a simple idea: make it easy for everyone to display the American flag on patriotic holidays.
                    What began as a small neighborhood service has grown into a trusted provider serving thousands of homes and businesses.
                </p>
                <p class="text-lg leading-relaxed mb-4">
                    Our team consists of veterans, patriotic citizens, and dedicated professionals who believe in the importance
                    of honoring our nation's heritage. Every flag we install represents our commitment to service, quality, and respect.
                </p>
                <p class="text-lg leading-relaxed">
                    Today, we're proud to be the leading flag subscription service, helping communities across the region display
                    their patriotism with dignity and pride on Memorial Day, Flag Day, Independence Day, Labor Day, and Veterans Day.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Values -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-8 shadow-md text-center">
                    <div class="text-blue-900 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Mission</h3>
                    <p class="text-gray-700">
                        To make patriotic flag display accessible, affordable, and hassle-free for every American home and business.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-8 shadow-md text-center">
                    <div class="text-blue-900 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Values</h3>
                    <p class="text-gray-700">
                        Quality, respect, professionalism, and unwavering commitment to honoring American traditions and military service.
                    </p>
                </div>

                <div class="bg-white rounded-lg p-8 shadow-md text-center">
                    <div class="text-blue-900 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Our Promise</h3>
                    <p class="text-gray-700">
                        Professional, timely service with high-quality flags that honor the dignity and meaning behind every patriotic holiday.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-5xl font-bold text-blue-900 mb-2">1000+</div>
                    <div class="text-gray-600">Customers Served</div>
                </div>
                <div>
                    <div class="text-5xl font-bold text-blue-900 mb-2">5</div>
                    <div class="text-gray-600">Holidays Covered</div>
                </div>
                <div>
                    <div class="text-5xl font-bold text-blue-900 mb-2">100%</div>
                    <div class="text-gray-600">Customer Satisfaction</div>
                </div>
                <div>
                    <div class="text-5xl font-bold text-blue-900 mb-2">5+</div>
                    <div class="text-gray-600">Years of Service</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Join Our Community</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-200">
            Become part of a proud tradition of displaying the American flag on important patriotic holidays
        </p>
        <a href="<?php echo e(route('register')); ?>"
           class="inline-block bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-medium transition">
            Get Started Today
        </a>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/xavierporter/Sites/localhost-new/FoC/resources/views/about.blade.php ENDPATH**/ ?>