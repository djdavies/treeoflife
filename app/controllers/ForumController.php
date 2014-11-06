<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06/11/2014
 * Time: 12:16
 */

	class ForumController extends BaseController {

		public function getForumHome() {

			$topics = ForumTopic::all();
			$categories = ForumCategory::all();
			return View::make( 'forum.index' )
				->with('topics', $topics)
				->with('categories', $categories);
		}

		public function getTopicCategory($id) {
			return View::make( 'forum.index' );
		}

		public function getForumThread($id) {
			return View::make( 'forum.index' );
		}

		public function postTopic(){
			$validator = Validator::make(Input::all(),
				[
					'topic_title' => 'require|unique:topic_title'
				]);

			if($validator->fails()){
				return Redirect::route('getForum')->withErrors($validator)->withInput()->with('modal', '#topic_form');
			}else{

			}
		}


	}