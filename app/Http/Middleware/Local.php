<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class Local
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $availableLocal = ['en','ar'];
        // $locale = session('APP_LOCALE');

        // $locale = in_array($locale ,$availableLocal) ? $locale: config('app.locale');

        // app()->setLocale($locale);

        if (session()->get('locale') == 'ar'){
            App::setLocale('ar');
        }
        else{
            App::setLocale('en');
        }


        return $next($request);
    }
}
