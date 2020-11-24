<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    
        if (strpos($request->segment(1), 'fr') !== false) {
            app()->setLocale('fr');
        } elseif (strpos($request->segment(1), 'ar') !== false) {

            app()->setLocale('ar');
        } else {
            app()->setLocale('fr');
        }
        return $next($request);
    }
}
