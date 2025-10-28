<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        // Web stack additions (you already had these)
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
        ]);

        // ✅ Route middleware aliases (REQUIRED)
        $middleware->alias([
            'auth'     => \App\Http\Middleware\Authenticate::class,              // must exist
            'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,

            // your custom admin gate (used in routes)
            'admin'    => \App\Http\Middleware\AdminMiddleware::class,

            // (Optional) Spatie aliases — only needed if you use role:admin
            // 'role'       => \Spatie\Permission\Middlewares\RoleMiddleware::class,
            // 'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();