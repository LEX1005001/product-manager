<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// Главная страница - редирект на магазин
Route::redirect('/', '/shop');

// Гостевые маршруты (только для неавторизованных)
Route::middleware('guest')->group(function () {
    // Аутентификация
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

    // Регистрация
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
});

// Защищенные маршруты (только для авторизованных)
Route::middleware('auth')->group(function () {
    // Магазин
    Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

    // Корзина
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
        Route::delete('/remove/{cartItem}', [CartController::class, 'remove'])->name('cart.remove');
        Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    });

    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Выход
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Админ-панель
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        // Управление товарами
        Route::resource('products', AdminProductController::class)->except(['show']);

        // Дополнительные админ-маршруты можно добавить здесь
    });
});

// Статические маршруты
Route::get('/about', function () {
    return view('static.about');
})->name('about');

Route::get('/contacts', function () {
    return view('static.contacts');
})->name('contacts');
