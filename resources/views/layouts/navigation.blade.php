<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('shop.index') }}">
            {{ config('app.name', 'Laravel') }}
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
                @auth
                <!-- Для всех авторизованных -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop.index') }}">Магазин</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        Корзина
                        @if(auth()->user()->cart()->count() > 0)
                        <span class="badge bg-danger">{{ auth()->user()->cart()->count() }}</span>
                        @endif
                    </a>
                </li>

                <!-- Для администраторов -->
                @if(auth()->user()->isAdmin())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Админ-панель
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.products.create') }}">Добавить товар</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.products.list') }}">Список товаров</a></li>
                    </ul>
                </li>
                @endif
                @endauth
            </ul>

            <ul class="navbar-nav ms-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Профиль</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Выйти</button>
                            </form>
                        </li>
                    </ul>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>