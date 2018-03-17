<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::user()->role != 'admin'){
            return back()->with('returnStatus', true)->with('status', 101)->with('message','you do not have authority to access this service');
        }
        return $next($request);
    }
}
