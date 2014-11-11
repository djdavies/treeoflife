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
            $category = ForumCategory::find($id);

            if($category == null){
                return Redirect::route('getForum')
                    ->with('error', "The category you tried to view doesn't exist!");
            }
            $threads = $category->threads();
			return View::make( 'forum.category' )
                ->with('category', $category)
                ->with('threads', $threads);
		}

		public function getForumThread($id) {
			return View::make( 'forum.index' );
		}

		public function postTopic(){
			$validator = Validator::make(Input::all(),
				[
					'topic_title' => 'required|unique:forum_topics,title'
				]);

			if($validator->fails()){
				return Redirect::route('getForum')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('modal', '#topic_title');
			}else{
                $topic = new ForumTopic;
                $topic->title = Input::get('topic_title');
                $topic->author_id = Auth::id();

                if($topic->save()){
                    return Redirect::route('getForum')->with('success', 'The Topic was Created');
                }else{
                    return Redirect::route('getForum')->with('fail', 'An Error Occurred while Saving');
                }
			}
		}

        public function postCategory(){
            $validator = Validator::make(Input::all(),
                [
                    'category_title' => 'required|unique:forum_categories,title'
                ]);

            if($validator->fails()){
                return Redirect::route('getForum')
                    ->withInput()
                    ->withErrors($validator)
                    ->with('modal', '#category_title');
            }else{
                $category = new ForumCategory;
                $category->title = Input::get('category_title');
                $category->author_id = Auth::id();
                $category->topic_id = Input::get('topic_id');

                if($category->save()){
                    return Redirect::route('getForum')->with('success', 'The Category was Created');
                }else{
                    return Redirect::route('getForum')->with('fail', 'An Error Occurred while Saving');
                }
            }
        }

        public function deleteTopic($id){
            $topic = ForumTopic::find($id);

            if($topic == null){
                return Redirect::route('getForum')->with('error', 'This Topic does not exist');
            }

            $topic->categories()->delete();
            $topic->threads()->delete();
            $topic->comments()->delete();
            $delTopics = $topic->delete();

            if($delTopics) {
                return Redirect::route('getForum')->with('success', 'This topic was deleted');
            }else{
                return Redirect::route('getForum')->with('error', 'Was unable to Delete topic');
            }
        }

        public function deleteCategory($id){
            $category = ForumCategory::find($id);

            if($category == null){
                return Redirect::route('getForum')->with('error', 'This Topic does not exist');
            }


            $category->threads()->delete();
            $category->comments()->delete();
            $delCategory = $category->delete();

            if($delCategory) {
                return Redirect::route('getForum')->with('success', 'This category was deleted');
            }else{
                return Redirect::route('getForum')->with('error', 'Was unable to Delete category');
            }
        }
	}