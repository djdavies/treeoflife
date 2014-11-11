<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06/11/2014
 * Time: 12:36
 */

	class ForumTopic extends Eloquent{

		protected $table = 'forum_topics';

        public function categories(){
            return $this->hasMany('ForumCategory', 'topic_id');
        }

        public function threads(){
            return $this->hasMany('ForumThread', 'topic_id');
        }

        public function comments(){
            return $this->hasMany('ForumComment', 'topic_id');
        }
	}