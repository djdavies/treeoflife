<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 04/11/2014
 * Time: 15:32
 */


class RecentPostsController extends BaseController {

    public function getMostRecent(){

    }

    public function getUserPosts(){
        $submissions = Submission::whereUserID(Auth::id())->get();
        return View::make('user')->with('submissions', $submissions);
    }

}