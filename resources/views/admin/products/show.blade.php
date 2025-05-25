@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Price:</strong> ${{ number_format($product->price, 2) }}</li>
                <li class="list-group-item"><strong>Quantity:</strong> {{ $product->quantity }}</li>
            </ul>
            <div class="mt-3">
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back to list</a>
            </div>
        </div>
    </div>
</div>
@endsection