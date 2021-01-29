<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function add(Request $request){
        Cart::create([
            'product_id' => $request->get('product_id'),
            'user_id' => Auth::user()->id,
            'quantity' => $request->quantity
        ]);
        return back();
    }

    public function delete(Cart $cart){
        $cart->where('product_id', $cart->product->id)->delete();
        return back();
    }
}
