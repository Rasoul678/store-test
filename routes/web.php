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


require 'admin.php';
Auth::routes();

require 'cart.php';
require 'order.php';

Route::get('/', 'ProductController@index')->name('home');

Route::get('/profile', 'ProfileController@show')->name('profile');

Route::resource('products', 'ProductController')->only(['index', 'show']);
    
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');