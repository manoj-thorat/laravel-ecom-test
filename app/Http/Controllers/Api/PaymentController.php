<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function checkout(Request $request)
    {
        try {
            $userId = 1; // Hardcoded as per your requirement

            // Get cart items
            $cartItems = Cart::with('product')->where('user_id', $userId)->get();
            if ($cartItems->isEmpty()) {
                return response()->json(['message' => 'Cart is empty'], 400);
            }

            // Calculate total
            $total = $cartItems->sum(fn($item) => $item->product->price * $item->quantity);

            // Razorpay order creation
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $razorpayOrder = $api->order->create([
                'receipt'   => 'rcptid_' . rand(1000, 9999),
                'amount'    => $total * 100, // in paise
                'currency'  => 'INR',
            ]);

            // Store order + items in DB
            DB::beginTransaction();

            $localOrder = Order::create([
                'user_id'    => $userId,
                'total'      => $total,
                'payment_id' => $razorpayOrder->id,
            ]);

            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id'   => $localOrder->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->product->price,
                ]);
            }

            // Clear the cart
            Cart::where('user_id', $userId)->delete();

            DB::commit();

            return response()->json([
                'message'         => 'Order created successfully',
                'razorpay_order'  => $razorpayOrder->id,
                'local_order_id'  => $localOrder->id,
                'amount'          => $total,
                'currency'        => 'INR',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
