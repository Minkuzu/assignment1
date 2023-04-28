<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.quantity' => 'required|numeric|min:1',
            'items.*.price' => 'required|numeric|min:1',
            'items.*.product_id' => 'required|integer|min:1',
        ]);
        $items = $request->input('items');
        $total = 0;
        foreach ($items as $item) {
            $total =  $total + ($item['quantity'] * $item['price']);
        }
        $checkout = new Checkout();
        $checkout->Total = $total;
        $checkout->save();
        foreach ($items as $item) {
            $order = new Order();
            $order->product_id = $item['product_id'];
            $order->quantity = $item['quantity'];
            $order->subtotal = $item['price'];
            $checkout->orders()->save($order);
        }
        $request->session()->forget('cart');
        return response()->json([
            'success' => true
        ]);
    }
}
