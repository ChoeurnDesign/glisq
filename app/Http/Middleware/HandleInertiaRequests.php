<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Illuminate\Support\Facades\Auth;

class HandleInertiaRequests extends Middleware
{

    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $user = Auth::user();

        $roles = [];
        if ($user && method_exists($user, 'getRoleNames')) {
            $roles = $user->getRoleNames()->toArray();
        }

        $isAdmin = $user && (
            (method_exists($user, 'hasRole') && $user->hasRole('admin')) ||
            (property_exists($user, 'is_admin') && $user->is_admin)
        );

        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $user ? [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                ] : null,
                'roles' => $roles,
                'isAdmin' => $isAdmin,
            ],
            'flash' => [
                'success' => fn() => $request->session()->get('success'),
                'error'   => fn() => $request->session()->get('error'),
            ],
            'cart' => fn() => array_values(session()->get('cart', [])),
        ]);
    }
}