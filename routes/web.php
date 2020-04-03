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
Route::get('/{product}', 'ProductController@show')->name('product')->where('product', '[0-9]+');

Route::get('/profile', 'ProfileController@show')->name('profile.show')->middleware('auth');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit')->middleware('auth');
Route::patch('/profile/update', 'ProfileController@update')->name('profile.update')->middleware('auth');
