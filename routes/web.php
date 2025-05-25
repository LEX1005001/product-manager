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
    // Главный маршрут магазина
    Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

    // Маршруты корзины
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');

    // Профиль
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Выход
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Админка
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Список товаров в админке
        Route::get('/products/list', [ProductController::class, 'adminIndex'])->name('products.list');

        // Стандартный resource с исключением index
        Route::resource('products', ProductController::class)->except(['index']);
    });
});
