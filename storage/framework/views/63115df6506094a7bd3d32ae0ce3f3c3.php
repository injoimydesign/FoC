<?php $__env->startSection('title', 'Pricing - Flag Subscription Service'); ?>

<?php $__env->startSection('content'); ?>
<div class="bg-gradient-to-br from-blue-900 to-blue-700 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <h1 class="text-4xl md:text-5xl font-bold mb-4">Simple, Transparent Pricing</h1>
        <p class="text-xl text-gray-200">Professional flag service with no hidden fees</p>
    </div>
</div>

<section class="py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            <!-- Flag Prices -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-center mb-12">Flag Options</h2>

                <?php if(isset($flags) && $flags->count() > 0): ?>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php $__currentLoopData = $flags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $flag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                                <div class="h-40 bg-gradient-to-br from-blue-100 to-red-100 flex items-center justify-center">
                                    <img src="<?php echo e($flag->image_url); ?>" alt="<?php echo e($flag->name); ?>" class="h-full object-contain p-4">
                                </div>
                                <div class="p-6">
                                    <?php if($flag->flag_type === 'military_flag'): ?>
                                        <span class="inline-block bg-green-100 text-green-800 text-xs font-semibold px-3 py-1 rounded-full mb-2">
                                            <?php echo e($flag->military_branch); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full mb-2">
                                            US Flag
                                        </span>
                                    <?php endif; ?>
                                    <h3 class="text-xl font-bold mb-2"><?php echo e($flag->name); ?></h3>
                                    <p class="text-gray-600 text-sm mb-4"><?php echo e($flag->description); ?></p>
                                    <div class="text-3xl font-bold text-blue-900">
                                        $<?php echo e(number_format($flag->base_price, 2)); ?>

                                        <span class="text-sm text-gray-600 font-normal">/holiday</span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php else: ?>
                    <p class="text-center text-gray-600">Loading flag options...</p>
                <?php endif; ?>
            </div>

            <!-- Pricing Comparison -->
            <div class="mb-16">
                <h2 class="text-3xl font-bold text-center mb-12">Service Plans</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                    <!-- One-Time -->
                    <div class="bg-white rounded-lg shadow-lg p-8 border-2 border-gray-200">
                        <h3 class="text-2xl font-bold mb-2">One-Time Service</h3>
                        <p class="text-gray-600 mb-6">Perfect for trying our service</p>

                        <div class="mb-6">
                            <span class="text-4xl font-bold text-blue-900">$45-$50</span>
                            <span class="text-gray-600">/holiday</span>
                        </div>

                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                One holiday of your choice
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Professional installation
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Flag maintenance
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Removal & storage
                            </li>
                        </ul>

                        <a href="<?php echo e(route('flags.index')); ?>"
                           class="block w-full bg-gray-200 text-gray-800 text-center py-3 rounded-lg font-medium hover:bg-gray-300 transition">
                            Choose Flag
                        </a>
                    </div>

                    <!-- Yearly Subscription -->
                    <div class="bg-blue-900 text-white rounded-lg shadow-lg p-8 border-2 border-blue-700 relative">
                        <div class="absolute top-0 right-0 bg-red-600 px-4 py-1 text-sm font-bold rounded-bl-lg">
                            SAVE 20%
                        </div>

                        <h3 class="text-2xl font-bold mb-2">Yearly Subscription</h3>
                        <p class="text-gray-200 mb-6">Best value for full coverage</p>

                        <div class="mb-6">
                            <span class="text-4xl font-bold">$180-$200</span>
                            <span class="text-gray-200">/year</span>
                            <p class="text-sm text-gray-300 mt-1">That's only $36-$40 per holiday!</p>
                        </div>

                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                All 5 patriotic holidays
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                20% discount savings
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Automatic scheduling
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Priority service
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Everything included
                            </li>
                        </ul>

                        <a href="<?php echo e(route('flags.index')); ?>"
                           class="block w-full bg-red-600 text-white text-center py-3 rounded-lg font-medium hover:bg-red-700 transition">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>

            <!-- What's Included -->
            <div class="bg-gray-100 rounded-lg p-8 mb-16">
                <h2 class="text-2xl font-bold text-center mb-8">What's Included in Every Service</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="bg-blue-900 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2">Premium Flag</h3>
                        <p class="text-sm text-gray-600">High-quality, weather-resistant 3'x5' flag</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-900 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2">Installation</h3>
                        <p class="text-sm text-gray-600">Professional setup on holiday morning</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-900 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2">Maintenance</h3>
                        <p class="text-sm text-gray-600">Flag care during display period</p>
                    </div>
                    <div class="text-center">
                        <div class="bg-blue-900 text-white w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h3 class="font-semibold mb-2">Removal</h3>
                        <p class="text-sm text-gray-600">Takedown and safe storage</p>
                    </div>
                </div>
            </div>

            <!-- FAQ Link -->
            <div class="text-center">
                <p class="text-gray-600 mb-4">Have questions about our pricing?</p>
                <a href="<?php echo e(route('faq')); ?>" class="text-blue-900 font-medium hover:underline">
                    Check out our FAQ →
                </a>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/xavierporter/Sites/localhost-new/FoC/resources/views/pricing.blade.php ENDPATH**/ ?>