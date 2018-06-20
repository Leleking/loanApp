<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;

class isSuper
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
        if(Auth::check() && Auth::user()->isAdmin() > 1 && Auth::user()->status){
            return $next($request);
        }
        return redirect('/');
    }
}
