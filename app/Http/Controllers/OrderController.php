<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        if(!session()->get('cart')) return response()->json([
            'error' => true,
            'user_name' => Auth::user()->name ?? "[N/A]",
            'user_email' => Auth::user()->email ?? "[N/A]",
        ]);

        $items = session()->get('cart');
        $total = 0;
        foreach ($items as $item) {
            $total =  $total + (intval($item['quantity']) * floatval($item['price']));
        }

        foreach ($items as $id => $item) {
            $order = new Order();
            $order->product_id = $id;
            $order->quantity = $item['quantity'];
            $order->subtotal = $item['price'];
            $order->grandtotal = $total;
            $order->user_name = Auth::user()->name ?? "[N/A]";
            $order->user_email = Auth::user()->email ?? "[N/A]";
            $order->save();
        }

        $request->session()->forget('cart');

        return response()->json([
            'Success' => true
        ]);
    }
}
