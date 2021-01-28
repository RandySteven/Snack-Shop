<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request){
        $attr = $request->all();
        $attr['product_id'] = $request->get('product_id');
        $attr['user_id'] = $request->get('user_id');
        Cart::create($attr);
        return back();
    }

    public function delete(Cart $cart){
        $cart->where('product_id', $cart->product->id)->delete();
        return back();
    }
}
