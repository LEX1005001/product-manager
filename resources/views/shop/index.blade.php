@extends('layouts.app')

@section('title', 'Магазин')

@section('content')
<div class="row">
    @foreach($products as $product)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">Цена: ${{ number_format($product->price, 2) }}</p>
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">В корзину</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection