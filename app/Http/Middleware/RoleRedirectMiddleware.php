<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleRedirectMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            /** @var \App\Models\User */
            $user = Auth::user();

            if ($user->hasRole('administrador')) {
                return redirect('/dashboard');
            } elseif ($user->hasRole('auditor')) {
                return redirect('/audits');
            }
            // mas roles
        }

        return $next($request);
    }
}
