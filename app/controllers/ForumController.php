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

        public function deleteTopic($id){
            $topic = ForumTopic::find($id);

            if($topic == null){
                return Redirect::route('getForum')->with('error', 'This Topic does not exist');
            }

            $delCategories = ForumCategory::where('topic_id', '=', $id)->delete();
            $delThreads = ForumThread::where('topic_id', '=', $id)->delete();
            $delComments = ForumComments::where('topic_id', '=', $id)->delete();
            $delTopics = $topic->delete();

            if($delCategories && $delThreads && $delComments && $delTopics) {
                return Redirect::route('getForum')->with('success', 'This topic was deleted');
            }else{
                return Redirect::route('getForum')->with('error', 'Was unable to Delete topic');
            }

        }
	}