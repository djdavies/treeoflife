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

    // Managing the description view and editing documents
    Route::get('d/{classification}', 'DescriptionController@getDescription' );

    //Authorisation these cannot be done unless the user is logged in
    Route::group(array('before'=>'auth'), function(){
        Route::get('create/{classification}', 'DescriptionController@createTaxon');
        Route::get('edit/{classification}', 'DescriptionController@editDescription');
        Route::get('delete/{classification}', 'DescriptionController@deleteDescription');
    });

	Route::post('d/{classification}', 'DescriptionController@postNew');
	Route::put('d/{classification}', 'DescriptionController@sendEdits');
	Route::delete('d/{classification}', 'DescriptionController@deleteTaxon');


    //making the posts page
    Route::get('user/posts', 'RecentPostsController@getUserPosts');


	View::composer('classification.edit', function($view){
		$classes = Genus::all();
		if(count($classes)>0){
			$classes_options = array_combine($classes->lists('id'),
										   $classes->lists('name'));
		}else{
			$classes_options = array_combine(NULL, 'Unspecified');
		}

		$view->with('classes_options', $classes_options);
	});

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