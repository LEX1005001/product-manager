<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админ панель | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Сайдбар -->
        <div class="bg-gray-800 text-white w-64 p-4">
            <h1 class="text-2xl font-bold mb-6">Админ панель</h1>
            <nav>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Главная</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('admin.products.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Товары</a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('profile.edit') }}" class="block px-4 py-2 rounded hover:bg-gray-700">Профиль</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 rounded hover:bg-gray-700">Выйти</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Основной контент -->
        <div class="flex-1 p-8">
            @yield('content')
        </div>
    </div>
</body>

</html>