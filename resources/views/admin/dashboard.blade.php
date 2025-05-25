@extends('layouts.admin')

@section('title', 'Админ панель')

@section('content')
<div class="bg-white rounded-lg shadow p-6">
    <h2 class="text-xl font-semibold mb-4">Добро пожаловать, администратор!</h2>
    <p class="mb-4">Вы можете управлять товарами и настройками системы.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-blue-50 p-4 rounded-lg">
            <h3 class="font-medium text-blue-800">Всего товаров</h3>
            <p class="text-2xl">{{ App\Models\Product::count() }}</p>
        </div>
        <div class="bg-green-50 p-4 rounded-lg">
            <h3 class="font-medium text-green-800">Пользователей</h3>
            <p class="text-2xl">{{ App\Models\User::count() }}</p>
        </div>
        <div class="bg-purple-50 p-4 rounded-lg">
            <h3 class="font-medium text-purple-800">Администраторов</h3>
            <p class="text-2xl">{{ App\Models\User::where('is_admin', true)->count() }}</p>
        </div>
    </div>
</div>
@endsection