<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 03/11/2014
 * Time: 15:27
 *
 * Description:
 */


class DescriptionController extends BaseController {

	public function getDescription($classification){
		$taxa = new Taxon;
		$item = $taxa::where('name', '=', $classification)->get();
		return View::make('description')
			->with("item", $item)
			->with('taxa', $taxa);
	}

	public function comment(){
		return View::make("suggest")
			->with('method', 'PUT');
	}

	public function sendSuggestion(){
		$suggestion = new Submission;
		$suggestion->comment = Input::get('comment');
		$suggestion->type = Input::get('type');;
		$suggestion->user_id = Auth::id();
		$suggestion->save();

		return Redirect::to('/profile')
			->with('message', 'Thank you for your suggestion');
	}
}