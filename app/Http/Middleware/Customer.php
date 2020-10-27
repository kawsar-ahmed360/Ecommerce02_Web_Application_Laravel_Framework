<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;
class Customer
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
         if (Auth::check() && Auth::User()->status=='1') {

           return $next($request);
             
         }else{

            return redirect()->back();
         }
    }
}
