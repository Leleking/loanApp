<?php

namespace App\Http\Middleware;


use Illuminate\Support\Facades\Auth;
use App\User;
use Closure;
use Illuminate\Support\Facades\Redirect;

class isStatus
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
        if(Auth::user()->status){
            return $next($request);
        }
        return redirect('/logout');
    }
}
