@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Наши товары</h1>

    @if($products->count() > 0)
    <div class="row mt-4">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5>{{ $product->name }}</h5>
                    <p>{{ $product->price }} руб.</p>
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary">В корзину</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-warning">Товары отсутствуют</div>
    @endif

    <!-- Пример ссылки с правильным именем маршрута -->
    <a href="{{ route('shop.index') }}" class="btn btn-secondary mt-3">Обновить список</a>
</div>
@endsection