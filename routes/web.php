<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FlagController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');

// Terms and Privacy (placeholder pages)
Route::get('/terms', function () {
    return view('terms');
})->name('terms');
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

// Flag Routes
Route::get('/flags', [FlagController::class, 'index'])->name('flags.index');
Route::get('/flags/us-flags', [FlagController::class, 'usFlags'])->name('flags.us');
Route::get('/flags/military-flags', [FlagController::class, 'militaryFlags'])->name('flags.military');
Route::get('/flags/{flag}', [FlagController::class, 'show'])->name('flags.show');

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Checkout Routes
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/create-session', [CheckoutController::class, 'createSession'])->name('checkout.create-session');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

    // User Profile Routes
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::put('/profile', [DashboardController::class, 'updateProfile'])->name('profile.update');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Flag Management
    Route::resource('flags', Admin\FlagController::class);

    // Flag Event Management
    Route::resource('flag-events', Admin\FlagEventController::class);

    // Subscription Management
    Route::get('/subscriptions', [Admin\SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{subscription}', [Admin\SubscriptionController::class, 'show'])->name('subscriptions.show');
    Route::put('/subscriptions/{subscription}/toggle', [Admin\SubscriptionController::class, 'toggle'])->name('subscriptions.toggle');

    // Route Management
    Route::resource('routes', Admin\RouteController::class);

    // User Management
    Route::get('/users', [Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [Admin\UserController::class, 'show'])->name('users.show');

    // Reports
    Route::get('/reports', [Admin\ReportController::class, 'index'])->name('reports.index');
});
