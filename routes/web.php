<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

// Главная страница - редирект на вход
Route::get('/', function () {
    return redirect()->route('login');
});

// Гостевые маршруты
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Защищенные маршруты
Route::middleware('auth')->group(function () {
    // Основной маршрут магазина
    Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

    // Корзина
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::delete('/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    });

    // Профиль
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Выход
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Админка (если нужно)
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('products', ProductController::class)->except(['index']);
    });
});
