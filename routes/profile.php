<?php
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        Route ::group(['middleware' => 'auth'], function () {
    
            Route::get('/', 'Site\ProfileController@show')->name('show');
            Route::get('/edit', 'Site\ProfileController@edit')->name('edit');
            Route::patch('/update', 'Site\ProfileController@update')->name('update');
            
        });
        
    });
    