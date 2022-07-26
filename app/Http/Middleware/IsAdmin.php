<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Support\Facades\App;

class IsAdmin
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

        if (auth()->user() && auth()->user()->role == 'admin') {
                return $next($request);
        }
        auth()->logout();
        return redirect('/');
    }
}
