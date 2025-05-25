@extends('layouts.guest')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Регистрация</h1>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block mb-2 text-sm font-medium">Имя</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-2 text-sm font-medium">Пароль</label>
            <input type="password" id="password" name="password"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block mb-2 text-sm font-medium">Подтвердите пароль</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Зарегистрироваться
        </button>
    </form>

    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Уже есть аккаунт?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Войдите</a>
        </p>
    </div>
</div>
@endsection