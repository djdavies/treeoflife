<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

	Route::get('/', 'HomeController@showWelcome');
	//controller for controlling the tree view of the website.
	Route::get('tree', ['uses' => 'TreeController@showTree', 'as' => 'treeView']);
	Route::get('tree/child', 'TreeController@getChildren');

	// controler for searching the database
	Route::get('searchbar', 'SearchController@searchbar');
	Route::get('search', 'SearchController@search');
	Route::post('search', 'SearchController@search');

	Route::get('searchbar', 'SearchController@searchbar');
	Route::get('search', 'SearchController@search');

	// Managing the description view
	Route::get('d/{classification}', 'DescriptionController@getDescription' );

	//Authorisation these cannot be done unless the user is logged in
	Route::group(['before'=>'auth'], function(){
		Route::get('suggestion', 'DescriptionController@comment');
	});

	//User can only see these pages as guest once logged in default to homepage
	Route::group(['before' => 'guest'], function(){
		Route::get('/user/create', ['uses' =>'UserController@getCreateUser', 'as' => 'getCreate']);
		Route::get('/user/login', 'UserController@getLogin');

		Route::group(['before' => 'csrf'], function(){
			Route::post('/user/create', ['uses' => 'UserController@postCreateUser', 'as' => 'userCreate']);
			Route::post('/user/login', 'UserController@postLogin');
		});
	});

	Route::get('logout', function(){
		Auth::logout();
		return Redirect::to('/')
			->with('message', 'You are now logged out');
	});