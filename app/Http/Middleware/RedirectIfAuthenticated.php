<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
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
            return redirect('/dashboard');
        }

        if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard');
        }

        if (Auth::guard('manager')->check()) {
            return redirect('/manager/dashboard');
        }

        if (Auth::guard('performance')->check()) {
            return redirect('/performance/dashboard');
        }

        if (Auth::guard('employee')->check()) {
            return redirect('/employee/dashboard');
        }

        return $next($request);
    }
}
