<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category){
        $products = $category->products()->get();
        $categories = Category::get();
        $carts = Cart::get();
        return view('product.index', compact('products', 'categories', 'carts'));
    }
}
