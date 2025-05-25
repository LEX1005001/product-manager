@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Список товаров</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">
        Добавить товар
    </a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">
                        Редактировать
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection