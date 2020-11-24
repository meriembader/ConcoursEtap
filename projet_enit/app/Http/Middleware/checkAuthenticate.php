<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Alert;

class checkAuthenticate
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            Alert::warning('Attention', 'Vous n\'êtes pas connecté!')->persistent('Fermer');
            return redirect('/login');
        }
        return $next($request);
    }

}
