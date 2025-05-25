@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Наши товары</h1>

    <div class="row mt-4">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5>{{ $product->name }}</h5>
                    <p>{{ $product->price }} руб.</p>
                    <a href="{{ route('cart.add', $product) }}" class="btn btn-primary">
                        В корзину
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection