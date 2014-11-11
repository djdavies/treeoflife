<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06/11/2014
 * Time: 12:38
 */

	class ForumComment extends Eloquent{

		protected $table = 'forum_comments';

        public function topics(){
            return $this->belongsTo('ForumTopic');
        }

        public function categories(){
            return $this->belongsTo('ForumCategory');
        }

        public function threads(){
            return $this->belongsTo('ForumThread');
        }
	}