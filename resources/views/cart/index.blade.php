@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Товар</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>${{ number_format($item->product->price, 2) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <form action="{{ route('cart.remove', $item) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="text-end">
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Оформить заказ</button>
    </form>
</div>
@endsection