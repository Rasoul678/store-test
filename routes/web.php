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
    
    

    use Illuminate\Support\Facades\Auth;
    
    Auth::routes();

    require 'admin.php';
    require 'cart.php';
    require 'order.php';
    require 'profile.php';
    
    Route::get('/', 'Site\HomeController@index')->name('home');
    
    Route::get('/search', 'Site\HomeController@search')->name('search');
    
    Route::get('/category/{slug}', 'Site\CategoryController@show')->name('category.show');
    
    Route::get('/{product}', 'Site\ProductController@show')->name('product.show')->where('product', '[0-9]+');
    

