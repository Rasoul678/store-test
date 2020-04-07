<?php
    
    Route::group(['prefix' => 'cart', 'as' => 'cart.'], function () {
        Route ::group(['middleware' => 'auth'], function () {
            
            Route ::get('show', 'Site\CartController@index') -> name('index');
            Route ::post('add/{product}', 'Site\CartController@add') -> name('add') -> where('product', '[0-9]+');
            Route ::post('remove/{cart_item}', 'Site\CartController@remove') -> name('remove') -> where('cart_item', '[0-9]+');
            });
      
    });
