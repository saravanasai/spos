<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class isAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::guard('employee')->check() && $request->url() == route('login')) {

            return redirect()->route('dashboard');
        }
        if (Auth::guard('employee')->check()) {

            return $next($request);
        }

        if (!Auth::user()) {

            return redirect()->route('login');
        }
        if (Auth::user() && $request->url() == route('login')) {

            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
