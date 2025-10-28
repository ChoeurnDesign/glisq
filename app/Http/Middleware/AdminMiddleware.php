<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, \Closure $next)
    {
        $u = $request->user();
        if (!$u) abort(403);

        if (method_exists($u, 'hasRole') && $u->hasRole('admin')) return $next($request);
        if (($u->is_admin ?? false) === true) return $next($request);

        abort(403);
    }   
}