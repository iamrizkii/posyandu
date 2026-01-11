<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsBidan
{
    /**
     * Handle an incoming request.
     * Middleware ini mengizinkan admin dan bidan untuk mengakses
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !in_array(auth()->user()->level, ['admin', 'bidan'])) {
            abort(403);
        }
        return $next($request);
    }
}
