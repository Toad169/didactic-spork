<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user->hasRole("admin")) {
            return $next($request);
        }
        if ($user->hasRole("staff")) {
            return $next($request);
        }
        if ($user->hasRole("user")) {
            return $next($request);
        }

        return $next($request);
    }
}
