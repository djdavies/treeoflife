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

	Route::get('/', ['uses' => 'HomeController@showWelcome', 'as' => 'home']);
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
		Route::get('/user/login', ['uses' => 'UserController@getLogin', 'as' => 'getLogin']);

		//further check to make sure form has been submitted from the website
		Route::group(['before' => 'csrf'], function(){
			Route::post('/user/create', ['uses' => 'UserController@postCreateUser', 'as' => 'userCreate']);
			Route::post('/user/login', ['uses' => 'UserController@postLogin', 'as' => 'postLogin']);
		});
	});

	//can only log out if user is logged in
	Route::group(['before' => 'auth'], function(){
		Route::get('user/logout', ['uses' => 'UserController@getLogout', 'as' => 'getLogout']);
	});

	//Routing for the Forum and its threads
	Route::group(['prefix' => 'forum'], function(){
		Route::get('/', ['uses' => 'ForumController@getForumHome', 'as' => 'getForum']);
		Route::get('/category/{id}', ['uses' => 'ForumController@getTopicCategory', 'as' => 'getTopicCategories']);
		Route::get('/thread/{id}', ['uses' => 'ForumController@getForumThread', 'as' => 'getThread']);

		Route::group(['before' => 'siteAdmin'], function(){

            Route::get('/topic/{id}/delete', ['uses' => 'ForumController@deleteTopic', 'as' => 'deleteTopic']);

			Route::group(['before' => 'csrf'], function(){
				Route::post('/topic', ['uses' => 'ForumController@postTopic', 'as' => 'postTopic']);
			});
		});
	});
