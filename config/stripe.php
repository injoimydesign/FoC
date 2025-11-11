<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Stripe Configuration
    |--------------------------------------------------------------------------
    |
    | Here you can configure your Stripe API keys and other settings.
    |
    */

    'key' => env('STRIPE_KEY'),
    'secret' => env('STRIPE_SECRET'),
    'webhook_secret' => env('STRIPE_WEBHOOK_SECRET'),

    'currency' => 'usd',

    'payment_methods' => [
        'card',
    ],

    'processing_fee' => [
        'percentage' => 0.029, // 2.9%
        'fixed' => 0.30,       // $0.30
    ],

    'subscription_discount' => 20, // 20% discount on yearly subscriptions

];
