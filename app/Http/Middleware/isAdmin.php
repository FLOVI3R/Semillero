<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;
use Illuminate\Http\Request;

class isAdmin
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
        if (Auth::user() && Auth::user()->type == 'a') {
            return $next($request);
        }

        return redirect('/');
    }
}
