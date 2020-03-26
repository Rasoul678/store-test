<?php

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
    
use App\Models\Product;
    
    require 'admin.php';
Auth::routes();

require 'cart.php';
require 'order.php';

Route::get('/', function () {
    $products = Product::orderBy('updated_at', 'asc')->get();
    return view('welcome', ['products' => $products]);
})->name('home');

Route::resource('products', 'ProductController')->only(['index', 'show']);
