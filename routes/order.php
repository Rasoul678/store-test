<?php
Route::group(['middleware' => 'auth'], function () {
    Route::name('order.')->group(function () {
        Route::get('order/', 'OrderController@index')->name('index');
        Route::get('order/{order}', 'OrderController@show')->name('show');
        Route::post('order/checkout', 'OrderController@checkout')->name('checkout');
    });
});
