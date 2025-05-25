@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Ваша корзина</h1>

    @if($cartItems->isEmpty())
    <div class="alert alert-info">Ваша корзина пуста</div>
    @else
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Товар</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итого</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>${{ number_format($item->product->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end"><strong>Общая сумма:</strong></td>
                    <td>${{ number_format($total, 2) }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>

    <div class="text-end mt-3">
        <form action="{{ route('cart.checkout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success btn-lg">Оформить заказ</button>
        </form>
    </div>
    @endif
</div>
@endsection