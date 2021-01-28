<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Category::get();
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('product.index', compact('products', 'categories', 'carts'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|min:5|max:30',
            'price' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'stock' => 'required'
        ]);
        $attr = $request->all();
        $attr['image'] = $request->file('image')->store("images/products");
        $attr['category_id'] = $request->get('category_id');
        Product::create($attr);
        return back()->with('success', 'Success to add product');
    }

    public function delete(Product $product){
        $product->delete($product);
        Storage::delete($product->image);
        return back()->with('success', 'Success to delete product');
    }

    public function addStock(Product $product, Request $request){
        $product->where('id', $product->id)->update([
            'stock' => $product->stock + $request->stock
        ]);
        return back();
    }
}
