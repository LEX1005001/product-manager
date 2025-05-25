<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RememberUser
{
    public function handle(Request $request, Closure $next)
    {
        if ($rememberCookie = $request->cookie('remember_web')) {
            if (Auth::viaRemember() || Auth::check()) {
                return $next($request);
            }
        }

        return $next($request);
    }
}
