<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->guest() || auth()->user()->role !== 'root') {
            return $next($request);
        } elseif (auth()->guest() || auth()->user()->role !== 'admin') {
            return $next($request);
        } else {
            abort(403);
        }

        // if (auth()->guest() || auth()->user()->role !== 'admin') {
        //     abort(403);
        // }
        // return $next($request);
    }
}
