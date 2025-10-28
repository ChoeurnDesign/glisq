<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 🔹 Prefetch assets for performance
        Vite::prefetch(concurrency: 3);

        // 🔹 Share global Inertia props (like auth.user)
        Inertia::share([
            'auth' => fn () => [
                'user' => Auth::user()
                    ? [
                        'id' => Auth::user()->id,
                        'name' => Auth::user()->name,
                        'email' => Auth::user()->email,
                        'role' => method_exists(Auth::user(), 'role') ? Auth::user()->role : null,
                    ]
                    : null,
            ],
            'flash' => fn () => [
                'success' => session('success'),
                'error' => session('error'),
            ],
            'cart' => function () {
                $cart = session()->get('cart', []);
                return array_values($cart);
            },
        ]);
    }
}