<?php

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('show', 'Site\CartController@index')->name('index');
    Route::delete('session/{cart_item}', 'Site\CartController@removeSessionCart')->name('removeSessionCart');
    Route::post('{product}', 'Site\CartController@add')->name('add')->where('product', '[0-9]+');
    Route::get('/checkout', 'Site\CartController@checkoutForm')->name('checkoutForm');
    Route::group(['middleware' => 'auth'], function () {
        Route::delete('remove/{cart_item}', 'Site\CartController@remove')->name('remove')->where('cart_item', '[0-9]+');
    });
});
