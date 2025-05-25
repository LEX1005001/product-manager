<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();
        $cartItems = $user->cart()->with('product')->get();

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Product $product)
    {
        /** @var User $user */
        $user = Auth::user();

        $cartItem = $user->cart()->firstOrCreate([
            'product_id' => $product->id
        ]);

        $cartItem->increment('quantity');

        return back()->with('success', 'Товар добавлен в корзину');
    }

    public function remove(Cart $cartItem)
    {
        /** @var User $user */
        $user = Auth::user();

        // Проверяем, что пользователь удаляет свой товар
        if ($cartItem->user_id !== $user->id) {
            abort(403, 'Недостаточно прав');
        }

        $cartItem->delete();
        return back()->with('success', 'Товар удален из корзины');
    }

    public function checkout()
    {
        /** @var User $user */
        $user = Auth::user();
        $user->cart()->delete();

        return redirect()->route('shop.index')->with('success', 'Заказ оформлен!');
    }
}
