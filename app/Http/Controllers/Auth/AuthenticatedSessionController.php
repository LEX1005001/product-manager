<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        // Установка куки на 30 дней
        $cookie = cookie('remember_web', Auth::user()->getRememberToken(), 43200);

        return redirect()->intended(route('shop.index'))
            ->withCookie($cookie)
            ->with('status', 'Вы успешно вошли в систему');
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')
            ->withoutCookie('remember_web');
    }

    protected function redirectTo()
    {
        // После входа перенаправляем в магазин
        return route('shop.index');
    }
}
