<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
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
        return redirect('/products')->with('success', 'Success to buy product');
    }

    public function history(){
        $transactions = Transaction::where('user_id', auth()->user()->id)->get();
        return view('transactions.history', compact('transactions'));
    }

    public function listTransaction(User $user){
        $transactions = Transaction::where('user_id', $user->id)->get();
        return view('transactions.history', compact('transactions'));
    }

    public function transactions(){
        $transactions = Transaction::all();
        return view('transactions.history', compact('transactions'));
    }

    public function detail(Transaction $transaction){
        $details = $transaction->details()->get();
        return view('transactions.detail', compact('details'));
    }
}
