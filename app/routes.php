<?php

Route::get('/', ['as'=> 'home', 'uses' => 'PhotoController@index']);
Route::get('/account/{id}', ['as'=> 'account', 'uses' => 'UserController@account']);
Route::get('/photo/{id}', ['as'=> 'photo.show', 'uses' => 'PhotoController@show']);


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
	Route::get('/upload', ['as'=> 'upload', 'uses' => 'PhotoController@create']);
	Route::post('/upload', ['as'=> 'upload', 'uses' => 'PhotoController@doCreate']);
	Route::get('/photo/{id}/like', ['as'=> 'photo.like.add', 'uses' => 'PhotoController@doLike']);
	Route::get('/photo/{id}/unlike', ['as'=> 'photo.like.remove', 'uses' => 'PhotoController@doUnlike']);
});

