<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartApiController extends Controller
{
    public function index()
    {
        $cart = Cart::with('product.images')->where('user_id', 1)->get();
        $total = $cart->sum(fn($item) => $item->product->price * $item->quantity);

        return response()->json([
            'items' => $cart,
            'total' => $total,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(['product_id' => 'required|exists:products,id']);

        $cart = Cart::firstOrCreate(
            ['user_id' => 1, 'product_id' => $request->product_id],
            ['quantity' => 1]
        );

        if (!$cart->wasRecentlyCreated) {
            $cart->increment('quantity');
        }

        return response()->json(['message' => 'Product added to cart']);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['quantity' => 'required|integer|min:1']);
        $cart = Cart::findOrFail($id);
        $cart->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Cart updated']);
    }

    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();
        return response()->json(['message' => 'Item removed']);
    }
}
