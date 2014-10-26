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
	return Redirect::route('tree', ['domain']);
});

Route::get('about', function(){
	return View::make('about')->with('number_of_species', 10);
});

Route::get('tree/{classification}', function($classification){
	$classes = new $classification;
	$items = $classes::all();
	return View::make('domain.class')
		->with("classification", $items)
		->with('classes', $classes);
});


Route::get('tree/{classification}/{id}/children', function($classification, $id){
	$class = $classification::find($id);
	return View::make('domain.index')
		->with("classification", $class);
});

Route::get('tree/{classification}/{id?}', [
	'as' => 'tree',
	function($classification, $id = null){
		$model = new $classification;
		$item = $id
			? $model::find($id)
			: $model::first();
		
		return View::make('domain.single')
			->with('item', $item)
			->with('self', $model);
	}
])->where('id', '[0-9]+');

//Authorisation these cannot be done unless the user is logged in
Route::group(array('before'=>'auth'), function(){
	Route::get('species/create', function() {
		$species = new species;
		return View::make('species.edit')
		->with('species', $species)
		->with('method', 'post');
	});

	Route::get('species/{species}/edit', function(species $species){
		return View::make('species.edit')
			->with('species', $species)
			->with('method', 'put');
	});

	Route::get('species/{species}/delete', function(species $species){
		if(Auth::user()->canEdit($species)){
			return View::make('species.edit')
				->with('species', $species)
				->with('method', 'delete');
		}else{
			return Redirect::to('species/'.$species->id);
		}
	});

	Route::post('species', function(){
		$species = species::create(Input::all());
		$submission->user_id = Auth::user()->id;
 		if($submission->save()){
			return Redirect::to('species/'.$species->id)
				->with('message', 'Successfully inserted a Species!');
		} else {
			return Redirect::back()
			->with('error', 'Could not create profile');
		}
	});

	Route::put('species/{species}', function(species $species){
		$species->update(Input::all());
		return Redirect::to('species/'.$species->id)
			->with('message', 'Successfully updated a Species!');
	});

	Route::delete('species/{species}', function(species $species){
		if(Auth::user()->canEdit($species)){
			$species->delete();
			return Redirect::to('species/', $species->id)
				->with('message', 'Successfully deleted a Species!');
		}else{
			return Redirect::to('species/'.$species->id);
		}
	});

	View::composer('species.edit', function($view){
		$genus = Genus::all();
		if(count($genus)>0){
			$genus_options = array_combine($genus->lists('id'), 
										   $genus->lists('name'));
		}else{
			$genus_options = array_combine(NULL, 'Unspecified');
		}

		$view->with('genus_options', $genus_options);
	});
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