<?php

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
//    Route::post('/search', 'UserController@search')->name('user.search');
});

/* animals // REBANHO */

Route::group(['prefix' => 'animals'], function () {
    Route::get('/index', 'AnimalController@index')->name('animals.index');
    Route::get('/create', 'AnimalController@create')->name('animals.create');
    Route::post('/store', 'AnimalController@store')->name('animals.store');
    Route::get('/edit/{id}', 'AnimalController@edit')->name('animals.edit');
    Route::put('/update/{id}', 'AnimalController@update')->name('animals.update');
    Route::get('/show/{id}', 'AnimalController@show')->name('animals.show');
    Route::get('/destroy/{id}', 'AnimalController@destroy')->name('animals.destroy');
    Route::post('/search', 'AnimalController@search')->name('animals.search');
    Route::get('/reports/all', 'AnimalController@animalsReports')->name('animals.report');
});


Route::group(['prefix' => 'cio'], function () {
    Route::get('/', 'AnimalHeatController@index')->name('cio.index');
    Route::get('/create/{id}', 'AnimalHeatController@create')->name('cio.create');
    Route::post('/store', 'AnimalHeatController@store')->name('cio.store');
    Route::get('/edit/{id}', 'AnimalHeatController@edit')->name('cio.edit');
    Route::put('/update/{id}', 'AnimalHeatController@update')->name('cio.update');
    Route::get('/show/{id}', 'AnimalHeatController@show')->name('cio.show');
    Route::post('/search', 'AnimalHeatController@search')->name('cio.search');
});

Route::namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->middleware('auth')//user-type:admin
    ->group(function () {
        Route::resource('/user', 'UserController');
        Route::get('/destroy/{id}', 'UserController@destroy')->name('user.destroy');
        Route::post('/search', 'UserController@search')->name('user.search');

        Route::resource('/farm', 'FarmController');
    });

Route::namespace('Client')
    ->name('client.')
    ->prefix('client')
    ->middleware('auth')
    ->group(function () {
    });
