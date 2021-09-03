<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function () {
    Route::post('/login', 'LoginController@login');
    Route::post('/register', 'RegisterController@register');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::namespace('User')->prefix('users')->group(function () {
        Route::get('/', 'UserController@list');
        Route::post('/', 'UserController@create');
        Route::get('/{user}', 'UserController@view');
        Route::put('/{user}', 'UserController@update');
        Route::delete('/{user}', 'UserController@delete');
    });

    Route::namespace('Car')->prefix('cars')->group(function () {
        Route::get('/', 'CarController@list');
        Route::post('/', 'CarController@create');
        Route::get('/{car}', 'CarController@view');
        Route::put('/{car}', 'CarController@update');
        Route::delete('/{car}', 'CarController@delete');
    });

    Route::namespace('Lending')->prefix('lending')->group(function () {
        Route::get('/', 'LendingController@list');
        Route::post('/', 'LendingController@create');
        Route::get('/{lending}', 'LendingController@view');
        Route::put('/{lending}', 'LendingController@update');
        Route::delete('/{lending}', 'LendingController@delete');

        Route::get('/lending_cars', 'QueriesController@getAllLendingCar');
        Route::get('/car/{car}', 'QueriesController@verifyCarIsLending');
    });
});

Route::middleware('auth:sanctum')
    ->namespace('Auth')->group(function () {
        Route::post('/logout', 'LoginController@logout');
    });
