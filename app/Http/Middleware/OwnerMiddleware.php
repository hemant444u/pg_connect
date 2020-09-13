<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class OwnerMiddleware
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
        if(Auth::user() && Auth::user()->role == 'owner' || Auth::User()->role == 'broker'){
            return $next($request);
        }
        return redirect('/owner/login');    }
}
