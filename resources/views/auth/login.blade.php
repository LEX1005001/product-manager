@extends('layouts.guest')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-center">Вход</h1>

    @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
        @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block mb-2 text-sm font-medium">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required autofocus>
        </div>

        <div class="mb-4">
            <label for="password" class="block mb-2 text-sm font-medium">Пароль</label>
            <input type="password" id="password" name="password"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" id="remember" name="remember"
                class="mr-2 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
            <label for="remember" class="text-sm text-gray-600">Запомнить меня</label>
        </div>

        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Войти
        </button>
    </form>

    <div class="mt-4 text-center">
        <p class="text-sm text-gray-600">Нет аккаунта?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Зарегистрируйтесь</a>
        </p>
    </div>
</div>
@endsection