<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function store(Request $request){
        $carts = Cart::where('user_id', auth()->user()->id);
        $cartUsers = $carts->get();
        $attr = $request->all();

        $transaction = auth()->user()->transactions()->create($attr);

        foreach($cartUsers as $cart){
            $transaction->details()->create([
                'product_id' => $cart->product->id,
                'quantity' => $cart->quantity
            ]);
            $product = Product::where('id', $cart->product->id);
            $product->decrement('stock', $cart->quantity);
        }
        $carts->delete();
        return redirect('/products');
    }
}
