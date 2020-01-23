<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class IsAdmin
{
    
    public function handle($request, Closure $next)
{
     if (Auth::user() &&  Auth::user()->admin == 1) {
            return $next($request);
     }

    return redirect('/');
}
}
