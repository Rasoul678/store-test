<?php
Route::group(['middleware' => 'auth'], function () {
    Route::name('cart.')->group(function () {
        Route::get('cart/show', 'CartController@index')->name('index');
        Route::post('cart/add/{product}', 'CartController@add')->name('add')->where('product', '[0-9]+');
        Route::post('cart/remove/{cart_item}', 'CartController@remove')->name('remove')->where('cart_item', '[0-9]+');
    });
});
