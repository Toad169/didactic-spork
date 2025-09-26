<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request for normal user role.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if a user is authenticated and has the 'user' role.
        // This is for routes specifically for a regular user. Note that admin and staff
        // roles would not pass this check.
        if (! Auth::check() || Auth::user()->role !== 'user') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
