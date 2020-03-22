<?php
    
    Route::group(['prefix'  =>  'admin'], function () {
        
        Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
        Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
        
        Route::group(['middleware' => ['auth:admin']], function () {
            
            Route::get('/', function () {
                return view('admin.dashboard.index');
            })->name('admin.dashboard');
            
            Route::group(['prefix'  =>   'categories'], function() {
                
                Route::get('/', 'Admin\CategoryController@index')->name('admin.categories.index');
                Route::get('/create', 'Admin\CategoryController@create')->name('admin.categories.create');
                Route::post('/store', 'Admin\CategoryController@store')->name('admin.categories.store');
                Route::get('/{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
                Route::post('/update', 'Admin\CategoryController@update')->name('admin.categories.update');
                Route::get('/{id}/delete', 'Admin\CategoryController@delete')->name('admin.categories.delete');
                
            });
            
            Route::group(['prefix' => 'products'], function () {
                
                Route::get('/', 'Admin\ProductController@index')->name('admin.products.index');
                Route::get('/create', 'Admin\ProductController@create')->name('admin.products.create');
                Route::post('/store', 'Admin\ProductController@store')->name('admin.products.store');
                Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('admin.products.edit');
                Route::post('/update', 'Admin\ProductController@update')->name('admin.products.update');
                Route::get('/{id}/delete', 'Admin\ProductController@delete')->name('admin.products.delete');
                
            });
            
            Route::group(['prefix' => 'orders'], function () {
                Route::get('/', 'Admin\OrderController@index')->name('admin.orders.index');
                Route::get('/{order}/show', 'Admin\OrderController@show')->name('admin.orders.show');
            });
            
        });
        
    });
