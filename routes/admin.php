<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['permission:admin']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('dashboard');

        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/', 'Admin\CategoryController@index')->name('index');
            Route::get('/create', 'Admin\CategoryController@create')->name('create');
            Route::get('/{category}', 'Admin\CategoryController@show')->name('show');
            Route::post('/store', 'Admin\CategoryController@store')->name('store');
            Route::get('/{category}/edit', 'Admin\CategoryController@edit')->name('edit');
            Route::patch('/{category}/update', 'Admin\CategoryController@update')->name('update');
            Route::post('/{category_slug}/restore', 'Admin\CategoryController@restore')->name('restore');
            Route::delete('/{category}/delete', 'Admin\CategoryController@destroy')->name('delete');
            Route::delete('/{category_slug}/force_delete',
                'Admin\CategoryController@forceDestroy')->name('forceDelete');
        });

        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/', 'Admin\ProductController@index')->name('index');
            Route::get('/create', 'Admin\ProductController@create')->name('create');
            Route::get('/{product}', 'Admin\ProductController@show')->name('show');
            Route::post('/store', 'Admin\ProductController@store')->name('store');
            Route::get('/{product}/edit', 'Admin\ProductController@edit')->name('edit');
            Route::patch('/{product}/update', 'Admin\ProductController@update')->name('update');
            Route::post('/{product_id}/restore', 'Admin\ProductController@restore')->name('restore');
            Route::delete('/{product}/delete', 'Admin\ProductController@destroy')->name('delete');
            Route::delete('/{product_id}/force_delete', 'Admin\ProductController@forceDestroy')->name('forceDelete');
        });

        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('show');
            Route::patch('/{order}', 'Admin\OrderController@update')->name('update');
            Route::get('/', 'Admin\OrderController@index')->name('index');
        });

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', 'Admin\UserController@index')->name('index');
            Route::get('/{user}', 'Admin\UserController@show')->name('show');
            Route::get('/{user}/edit', 'Admin\UserController@edit')->name('edit');
            Route::patch('/{user}/update', 'Admin\UserController@update')->name('update');
            Route::get('/{user}/carts', 'Admin\UserController@showCartItems')->name('carts');
        });

        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
            Route::get('/', 'Admin\RolePermissionController@indexRole')->name('index');
            Route::get('/create', 'Admin\RolePermissionController@createRole')->name('create');
            Route::post('/', 'Admin\RolePermissionController@storeRole')->name('store');
            Route::get('/{role}', 'Admin\RolePermissionController@editRole')->name('edit');
            Route::patch('/{role}', 'Admin\RolePermissionController@updateRole')->name('update');
            Route::delete('/{role}', 'Admin\RolePermissionController@deleteRole')->name('delete');
        });

        Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
            Route::get('/', 'Admin\RolePermissionController@indexPermission')->name('index');
        });

        Route::resource('cities', 'Admin\CityController');

    });

});
