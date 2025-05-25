@extends('layouts.app')

@section('title', 'Корзина')
@section('content')
<div class="py-6">
    <h1 class="text-3xl font-bold mb-6">Ваша корзина</h1>

    @if($cartItems->count())
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Товар</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Цена</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Количество</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Итого</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Действия</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($cartItems as $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->product->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->product->price, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $item->quantity }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('cart.remove', $item) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="px-6 py-4 text-right font-bold">Общая сумма:</td>
                    <td class="px-6 py-4 font-bold">${{ number_format($total, 2) }}</td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <div class="px-6 py-4 bg-gray-50 text-right">
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Оформить заказ
                </button>
            </form>
            <a href="{{ route('shop.index') }}" class="ml-4 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Продолжить покупки
            </a>
        </div>
    </div>
    @else
    <div class="bg-white p-4 rounded shadow">
        <p class="text-gray-600">Ваша корзина пуста</p>
        <a href="{{ route('shop.index') }}" class="mt-4 inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Вернуться в магазин
        </a>
    </div>
    @endif
</div>
@endsection