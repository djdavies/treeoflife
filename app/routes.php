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

    // manages main views of the website
	Route::get('/', ['uses' => 'HomeController@showWelcome', 'as' => 'home']);
	Route::get('tree', ['uses' => 'TreeController@showTree', 'as' => 'treeView']);
	Route::get('tree/child', 'TreeController@getChildren');
    Route::get('d/{classification}', 'DescriptionController@getDescription' );

	Route::group(['prefix' => 'search'], function(){
		// controler for searching the database
		Route::get('searchbar', ['uses' => 'SearchController@searchbar', 'as' => 'searchbar']);
		Route::get('/', ['uses' => 'SearchController@search', 'as' => 'search']);
		Route::post('/', ['uses' => 'SearchController@search', 'as' => 'getSearchResults']);
	});

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

        Route::group(['before' => 'auth'], function(){
            Route::get('/thread/{id}/new', ['uses' => 'ForumController@newThread', 'as' => 'newThread']);

            Route::group(['before' => 'csrf'], function(){
                Route::post('/thread/{id}/new', ['uses' => 'ForumController@postThread', 'as' => 'postThread']);
            });
        });

        Route::group(['before' => 'forumAdmin'], function(){
            Route::get('/category/{id}/new', ['uses' => 'ForumController@newCategory', 'as' => 'newCategory']);

            Route::group(['before' => 'csrf'], function(){
                Route::post('/category/{id}/new', ['uses' => 'ForumController@postCategory', 'as' => 'postCategory']);
            });
        });

		Route::group(['before' => 'siteAdmin'], function(){
            Route::get('/topic/{id}/delete', ['uses' => 'ForumController@deleteTopic', 'as' => 'deleteTopic']);
            Route::get('/category/{id}/delete', ['uses' => 'ForumController@deleteCategory', 'as' => 'deleteCategory']);

			Route::group(['before' => 'csrf'], function(){
				Route::post('/topic', ['uses' => 'ForumController@postTopic', 'as' => 'postTopic']);
			});
		});
	});
