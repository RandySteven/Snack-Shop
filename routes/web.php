<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function(){
    Route::prefix('products')->group(function(){
        Route::get('', [ProductController::class, 'index'])->name('product.index');
        Route::post('store', [ProductController::class, 'store'])->name('product.store');
        Route::delete('delete/{product:id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::patch('add-stock/{product:id}', [ProductController::class, 'addStock'])->name('product.add.stock');
    });

    Route::post('add-to-cart', [CartController::class, 'add'])->name('add.cart');
    Route::delete('delete-from-cart/{cart:product_id}', [CartController::class, 'delete'])->name('add.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
