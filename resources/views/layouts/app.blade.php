<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <!-- Подключаем Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Или через Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    @include('layouts.navigation')

    <main class="container mx-auto py-4 px-4">
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>