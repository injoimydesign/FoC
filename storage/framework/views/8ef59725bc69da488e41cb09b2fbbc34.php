<?php $__env->startSection('title', 'Our Services - Flag Subscription Service'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="bg-gradient-to-br from-blue-900 to-blue-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Flag Services</h1>
        <p class="text-xl text-gray-200 max-w-2xl mx-auto">
            Professional flag installation for patriotic holidays throughout the year
        </p>
    </div>
</div>

<!-- Service Plans -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Choose Your Service Plan</h2>
                <p class="text-gray-600">Select the option that works best for you</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- One-Time Service -->
                <div class="bg-white rounded-lg shadow-lg p-8 border-2 border-gray-200 hover:border-blue-500 transition">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold mb-2">One-Time Service</h3>
                        <p class="text-gray-600">Perfect for a single holiday</p>
                    </div>

                    <div class="text-center mb-8">
                        <span class="text-4xl font-bold text-blue-900">$45-$50</span>
                        <span class="text-gray-600 block">per installation</span>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>One patriotic holiday of your choice</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Professional installation</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Flag maintenance during display</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Removal after holiday</span>
                        </li>
                    </ul>

                    <a href="<?php echo e(route('flags.index')); ?>"
                       class="block w-full bg-gray-200 text-gray-800 text-center px-6 py-3 rounded-lg font-medium hover:bg-gray-300 transition">
                        Select Flag
                    </a>
                </div>

                <!-- Yearly Subscription -->
                <div class="bg-blue-900 text-white rounded-lg shadow-lg p-8 border-2 border-blue-700 relative">
                    <div class="absolute top-0 right-0 bg-red-600 text-white px-4 py-1 text-sm font-bold rounded-bl-lg">
                        BEST VALUE
                    </div>

                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold mb-2">Yearly Subscription</h3>
                        <p class="text-gray-200">All 5 patriotic holidays</p>
                    </div>

                    <div class="text-center mb-8">
                        <span class="text-4xl font-bold">Save 20%</span>
                        <span class="block text-gray-200 mt-2">Billed annually</span>
                    </div>

                    <ul class="space-y-4 mb-8">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>All 5 patriotic holidays covered</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>20% discount vs one-time pricing</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Automatic service scheduling</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-400 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Priority service guaranteed</span>
                        </li>
                    </ul>

                    <a href="<?php echo e(route('flags.index')); ?>"
                       class="block w-full bg-red-600 text-white text-center px-6 py-3 rounded-lg font-medium hover:bg-red-700 transition">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Patriotic Holidays -->
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">5 Patriotic Holidays We Serve</h2>
                <p class="text-gray-600">Professional flag display for these important dates</p>
            </div>

            <div class="space-y-4">
                <?php if(isset($flagEvents) && $flagEvents->count() > 0): ?>
                    <?php $__currentLoopData = $flagEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="bg-white rounded-lg p-6 shadow-md flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="bg-blue-100 text-blue-900 rounded-full p-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="text-xl font-semibold"><?php echo e($event->name); ?></h3>
                                    <p class="text-gray-600"><?php echo e($event->description); ?></p>
                                </div>
                            </div>
                            <div class="text-right">
                                <span class="text-lg font-semibold text-blue-900">
                                    <?php echo e($event->date->format('M j, Y')); ?>

                                </span>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="bg-white rounded-lg p-6 shadow-md text-center">
                        <p class="text-gray-600">Holiday schedule will be updated soon.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">How Our Service Works</h2>
                <p class="text-gray-600">Simple, professional, and hassle-free</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">1</div>
                    <h3 class="text-xl font-semibold mb-2">Choose Your Flag</h3>
                    <p class="text-gray-600">Select from US or military branch flags</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">2</div>
                    <h3 class="text-xl font-semibold mb-2">Select Plan</h3>
                    <p class="text-gray-600">One-time or yearly subscription</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">3</div>
                    <h3 class="text-xl font-semibold mb-2">We Install</h3>
                    <p class="text-gray-600">Professional setup on holiday morning</p>
                </div>
                <div class="text-center">
                    <div class="bg-blue-900 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">4</div>
                    <h3 class="text-xl font-semibold mb-2">We Remove</h3>
                    <p class="text-gray-600">Takedown and storage after holiday</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Get Started?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto text-gray-200">
            Join hundreds of satisfied customers displaying their patriotism with pride
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?php echo e(route('register')); ?>"
               class="bg-red-600 hover:bg-red-700 text-white px-8 py-3 rounded-lg font-medium transition">
                Sign Up Now
            </a>
            <a href="<?php echo e(route('contact')); ?>"
               class="bg-white text-blue-900 hover:bg-gray-100 px-8 py-3 rounded-lg font-medium transition">
                Contact Us
            </a>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/xavierporter/Sites/localhost-new/FoC/resources/views/services.blade.php ENDPATH**/ ?>