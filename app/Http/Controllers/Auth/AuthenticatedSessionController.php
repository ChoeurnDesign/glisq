<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = $request->user();

        // If you're using Spatie roles:
        if (method_exists($user, 'hasRole') && $user->hasRole('admin')) {
            // FORCE redirect to admin dashboard (do NOT use intended)
            return redirect()->route('admin.index');
        }

        // If you use a boolean column is_admin:
        if (($user->is_admin ?? false) === true) {
            // FORCE redirect to admin dashboard (do NOT use intended)
            return redirect()->route('admin.index');
        }

        // Normal users can go to home (or use intended if you prefer)
        return redirect()->route('home');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}