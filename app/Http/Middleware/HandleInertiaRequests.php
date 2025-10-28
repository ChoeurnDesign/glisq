<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $rootView = 'app';

    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    public function share(Request $request): array
    {
        $user = $request->user();
        $roles = [];
        if ($user && method_exists($user, 'getRoleNames')) {
            $roles = $user->getRoleNames()->toArray();
        }

        $isAdmin = false;
        if ($user) {
            if (method_exists($user, 'hasRole') && $user->hasRole('admin')) $isAdmin = true;
            elseif (property_exists($user, 'is_admin') && $user->is_admin) $isAdmin = true;
        }

        return [
            ...parent::share($request),
            'auth' => [
                'user' => $user,
                'roles' => $roles,
                'isAdmin' => $isAdmin,
            ],
            'flash' => [
                'success' => fn () => $request->session()->get('success'),
                'error'   => fn () => $request->session()->get('error'),
            ],
        ];
    }
}