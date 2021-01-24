<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function store(Request $request){
        $attr = $request->all();
        $attr['image'] = $request->file('image')->store("images/products");
        $attr['category_id'] = $request->get('category_id');
        Product::create($attr);
        return back()->with('success', 'Success to add product');
    }
}
