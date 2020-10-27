<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

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
            if (Auth::User()->status=='1') {
                return redirect('/customer_dashobrd');
                
            }elseif (Auth::User()->status=='2') {
                
                return redirect('/home');
            }elseif (Auth::User()->status=='3') {
                
                return redirect('/home');
            }
           
        }

        return $next($request);
    }
}
