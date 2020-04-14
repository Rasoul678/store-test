<?php

Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
    Route::get('show', 'Site\CartController@index')->name('index');
    Route::delete('session/{cart_item}', 'Site\CartController@removeGuestCart')->name('removeGuestCart');
    Route::post('{product}', 'Site\CartController@add')->name('add')->where('product', '[0-9]+');
    Route::group(['middleware' => 'auth'], function () {
        Route::delete('remove/{cart_item}', 'Site\CartController@remove')->name('remove')->where('cart_item', '[0-9]+');
    });
});
