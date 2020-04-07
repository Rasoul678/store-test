<?php

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => ['permission:add product']], function () {

        Route::get('/', function () {
            return view('admin.dashboard.index');
        })->name('dashboard');

        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/', 'Admin\CategoryController@index')->name('index');
            Route::get('/create',
                'Admin\CategoryController@create')->name('create')->middleware('permission:add category');
            Route::get('/{category}', 'Admin\CategoryController@show')->name('show');
            Route::post('/store',
                'Admin\CategoryController@store')->name('store')->middleware('permission:add category');
            Route::get('/{category}/edit',
                'Admin\CategoryController@edit')->name('edit')->middleware('permission:edit category');
            Route::patch('/{category}/update',
                'Admin\CategoryController@update')->name('update')->middleware('permission:edit category');
            Route::post('/{category_slug}/restore',
                'Admin\CategoryController@restore')->name('restore')->middleware('permission:delete category');
            Route::delete('/{category}/delete',
                'Admin\CategoryController@destroy')->name('delete')->middleware('permission:delete category');
            Route::delete('/{category_slug}/force_delete',
                'Admin\CategoryController@forceDestroy')->name('forceDelete')->middleware('permission:permanent delete category');
        });

        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/', 'Admin\ProductController@index')->name('index');
            Route::get('/create',
                'Admin\ProductController@create')->name('create')->middleware('permission:add product');
            Route::get('/{product}', 'Admin\ProductController@show')->name('show');
            Route::post('/store', 'Admin\ProductController@store')->name('store')->middleware('permission:add product');
            Route::get('/{product}/edit',
                'Admin\ProductController@edit')->name('edit')->middleware('permission:edit product');
            Route::patch('/{product}/update',
                'Admin\ProductController@update')->name('update')->middleware('permission:edit product');
            Route::post('/{product_id}/restore',
                'Admin\ProductController@restore')->name('restore')->middleware('permission:delete product');
            Route::delete('/{product}/delete',
                'Admin\ProductController@destroy')->name('delete')->middleware('permission:delete product');
            Route::delete('/{product_id}/force_delete',
                'Admin\ProductController@forceDestroy')->name('forceDelete')->middleware('permission:permanent delete product');
        });

        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::get('/{order}/show', 'Admin\OrderController@show')->name('show');
            Route::get('/', 'Admin\OrderController@index')->name('index');
        });

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', 'Admin\UserController@index')->name('index');
            Route::get('/{user}', 'Admin\UserController@show')->name('show');
            Route::get('/{user}/edit', 'Admin\UserController@edit')->name('edit')->middleware('permission:edit user');
            Route::patch('/{user}/update',
                'Admin\UserController@update')->name('update')->middleware('permission:edit user');
        });

        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
            Route::get('/', 'Admin\RolePermissionController@indexRole')->name('index');
            Route::get('/create',
                'Admin\RolePermissionController@createRole')->name('create')->middleware('permission:add role');
            Route::post('/',
                'Admin\RolePermissionController@storeRole')->name('store')->middleware('permission:add role');
            Route::get('/{role}',
                'Admin\RolePermissionController@editRole')->name('edit')->middleware('permission:edit role');
            Route::patch('/{role}',
                'Admin\RolePermissionController@updateRole')->name('update')->middleware('permission:edit role');
            Route::delete('/{role}',
                'Admin\RolePermissionController@deleteRole')->name('delete')->middleware('permission:delete role');
        });

        Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
            Route::get('/', 'Admin\RolePermissionController@indexPermission')->name('index');
        });

    });

});
