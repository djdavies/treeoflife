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

	Route::get('/', function(){
		return Redirect::to('tree');
	});

	//controller for controlling the tree view of the website.
	Route::get('tree', 'TreeController@showTree');
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
	Route::group(array('before'=>'auth'), function(){
		Route::get('suggestion', 'DescriptionController@comment');
	});

	Route::put('suggestion', 'DescriptionController@sendSuggestion');


	Route::get('login', function(){
		return View::make('login');
	});

	Route::post('login', function(){
		if(Auth::attempt(Input::only('username', 'password'))) {
			return Redirect::intended('/');
		} else {
			return Redirect::intended('/login')
				->withInput()
				->with('error', "Invalid credentials");
		}
	});

	Route::get('logout', function(){
		Auth::logout();
		return Redirect::to('/')
			->with('message', 'You are now logged out');
	});