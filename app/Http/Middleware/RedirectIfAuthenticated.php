<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(Auth::user()->role == 'admin')
            {
                return redirect()->intended('/daily-work-entry/show');
            }

            if(Auth::user()->role == 'tutor')
            {
                return redirect()->intended('dashboard');
            }
        }

        return $next($request);
    }
}
