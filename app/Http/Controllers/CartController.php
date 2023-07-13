<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    protected $productController;
    protected $categoryController;  

    public function construct(ProductController $productController, CategoryController $categoryController)
    {
        $this->productController = $productController;
        $this->categoryController = $categoryController;
    }
    public function cart()
    {
        return view('cart');
    }
    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "image" => $product->image,
                "price" => $product->price,
                "desc" => $product->desc,
                "quantity" => 1
            ];
        }
        session()->put('cart', $cart);
        Cart::create($cart[$id]);
        return redirect()->back()->with('success', 'Product Has Been Added To Cart');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart Has Been Updated');
        }
        
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product Has Been Removed From Cart');
        }
    }
}
