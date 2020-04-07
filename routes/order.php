<?php
    Route::group(['prefix' => 'order', 'as' => 'order.'], function () {
        Route ::group(['middleware' => 'auth'], function () {
    
            Route::get('/', 'Site\OrderController@index')->name('index');
            Route::get('/{order}', 'Site\OrderController@show')->name('show');
            Route::post('/checkout', 'Site\OrderController@checkout')->name('checkout');
       
        });
        
    });
