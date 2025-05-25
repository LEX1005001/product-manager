<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view('shop.index', ['products' => Product::all()]);
    }

    public function checkout()
    {
        return redirect()->route('shop.index')->with('success', 'Заказ оформлен!');
    }

    public function adminIndex()
    {
        return view('admin.products.index', [
            'products' => Product::withTrashed()->get()
        ]);
    }
}
