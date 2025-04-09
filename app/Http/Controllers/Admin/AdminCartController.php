<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;

class AdminCartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product.images')->where('user_id', 1)->get();

        $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

        return view('admin.cart.index', compact('cartItems', 'total'));
    }
}
