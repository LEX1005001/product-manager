<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Подключение стилей -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fallback для Vite -->
    @env('local')
    <script type="module">
        import RefreshRuntime from 'http://localhost:3000/@react-refresh'
        RefreshRuntime.injectIntoGlobalHook(window)
        window.$RefreshReg$ = () => {}
        window.$RefreshSig$ = () => (type) => type
        window.__vite_plugin_react_preamble_installed__ = true
    </script>
    @endenv
</head>

<body class="antialiased">
    <div id="app">
        @include('layouts.navigation')

        <main class="py-4 container mx-auto px-4">
            {{ $slot ?? '' }}
        </main>
    </div>
</body>

</html>