<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Auth\GoogleController;


Route::get('/', fn () => Inertia::render('Home'))->name('home');

Route::get('/auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

Route::get('/about', fn () => Inertia::render('About'))->name('about');
Route::get('/contact', fn () => Inertia::render('Contact'))->name('contact');
Route::get('/science', fn () => Inertia::render('Science'))->name('science');
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');

Route::get('/faq', fn () => Inertia::render('FAQ'))->name('faq');
Route::get('/shipping', fn () => Inertia::render('Shipping'))->name('shipping');
Route::get('/returns', fn () => Inertia::render('Returns'))->name('returns');
Route::get('/privacy-policy', fn () => Inertia::render('PrivacyPolicy'))->name('privacy');
Route::get('/terms', fn () => Inertia::render('Terms'))->name('terms');
Route::get('/skin-quiz', fn () => Inertia::render('SkinQuiz'))->name('skin.quiz');

// 🧴 Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// 📝 Review route (allow all users)
Route::post('/products/{product:slug}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', function () {
        return Inertia::render('Profile', ['user' => Auth::user()]);
    })->name('profile');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
});

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
        Route::resource('products', AdminProductController::class)->except(['show']);
        Route::resource('users', AdminUserController::class)->only(['index', 'update', 'destroy']);
    });

require __DIR__ . '/auth.php';