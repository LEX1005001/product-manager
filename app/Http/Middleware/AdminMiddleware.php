<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user instanceof User || !$user->isAdmin()) {
            abort(403, 'Доступ запрещен. Требуются права администратора.');
        }

        return $next($request);
    }
}
