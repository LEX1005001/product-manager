@extends('layouts.app')

@section('title', 'Магазин')
@section('content')
<div class="py-6">
    <h1 class="text-3xl font-bold mb-6">Наши товары</h1>

    @if($products->count())
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-white rounded-lg shadow overflow-hidden">
            @if($product->image)
            <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            @endif
            <div class="p-4">
                <h3 class="text-xl font-semibold">{{ $product->name }}</h3>
                <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                <div class="mt-4 flex justify-between items-center">
                    <span class="text-lg font-bold">${{ number_format($product->price, 2) }}</span>
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            В корзину
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-600">Товары отсутствуют</p>
    </div>
    @endif
</div>
@endsection