<?php

namespace Kerung\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;

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
       if (auth()->check() ) {
                return $next($request);
            }
            else{
                Session::flash('message', 'Soory you need to login first !!');
                return Redirect::route('singin');
            }
             return $next($request);
    }
}
