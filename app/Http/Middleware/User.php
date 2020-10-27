<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class User
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
        if (Auth::check() && Auth::User()->status=='3') {
            
        return $next($request);
        }else{

            return redirect()->back();
        }
    }
}
