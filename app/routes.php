<?php

Route::get('/', ['as'=> 'home', 'uses' => 'PhotoController@index']);
Route::get('/account/{id}', ['as'=> 'account', 'uses' => 'UserController@account']);


Route::group(['before' => 'guest'], function() {
	Route::get('/login', ['as'=> 'login', 'uses' => 'AuthController@login']);
	Route::post('/login', ['as'=> 'login', 'uses' => 'AuthController@doLogin']);
	Route::get('/registration', ['as'=> 'registration', 'uses' => 'AuthController@registration']);
	Route::post('/registration', ['as'=> 'registration', 'uses' => 'AuthController@doRegistration']);
});

Route::group(['before' => 'auth'], function() {
	Route::get('/logout', ['as'=> 'logout', 'uses' => 'AuthController@doLogout']);
	// edit account
	Route::get('/account/{id}/edit', ['as'=> 'account.edit', 'uses' => 'UserController@editAccount']);
	Route::put('/account/{id}/edit', ['as'=> 'account.edit', 'uses' => 'UserController@doEditAccount']);
});

