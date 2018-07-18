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
    public function handle($request , Closure $next , $guard = null)
    {
        $guards = array_keys(config('auth.guards')) ;

        // if select guard
        if (!! $guard)
            if (Auth::guard($guard)->check())
                return redirect()->route("dashboard.{$guard}.main") ;
        // if not select guard
        foreach ($guards as $guard)
            if (Auth::guard($guard)->check())
                return redirect()->route("dashboard.{$guard}.main") ;

        return $next($request);
    }
}
