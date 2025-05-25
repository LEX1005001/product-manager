<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="{{ route('shop.index') }}" class="text-xl font-bold text-gray-900">
                    {{ config('app.name') }}
                </a>
            </div>

            <div class="flex items-center space-x-4">
                @auth
                <a href="{{ route('cart.index') }}" class="relative px-3 py-2 text-gray-700 hover:text-gray-900">
                    Корзина
                    @if($cartCount = auth()->user()->cart()->count())
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                        {{ $cartCount }}
                    </span>
                    @endif
                </a>

                @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.products.create') }}" class="px-3 py-2 text-gray-700 hover:text-gray-900">
                    Админка
                </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3 py-2 text-gray-700 hover:text-gray-900">
                        Выйти
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="px-3 py-2 text-gray-700 hover:text-gray-900">
                    Войти
                </a>
                <a href="{{ route('register') }}" class="px-3 py-2 text-gray-700 hover:text-gray-900">
                    Регистрация
                </a>
                @endauth
            </div>
        </div>
    </div>
</nav>