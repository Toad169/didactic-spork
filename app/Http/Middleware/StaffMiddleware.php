<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StaffMiddleware
{
    /**
     * Handle an incoming request for staff and admin roles.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if a user is authenticated and has either 'admin' or 'staff' role.
        if (! Auth::check() || ! in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
