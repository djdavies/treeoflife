<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 06/11/2014
 * Time: 12:37
 */

	class ForumCategory extends Eloquent{

		protected $table = 'forum_categories';

        public function topics(){
            return $this->belongsTo('ForumTopic');
        }

        public function threads(){
            return $this->hasMany('ForumThread', 'category_id');
        }

        public function comments(){
            return $this->hasMany('ForumComment', 'category_id');
        }
	}