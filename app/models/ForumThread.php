<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06/11/2014
 * Time: 12:37
 */

	class ForumThread extends Eloquent{

		protected $table = 'forum_threads';

        public function topics(){
            return $this->belongsTo('ForumTopic');
        }

        public function categories(){
            return $this->belongsTo('ForumCategory');
        }

        public function comments(){
            return $this->hasMany('ForumComment', 'thread_id');
        }

	}