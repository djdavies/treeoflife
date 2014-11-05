<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

	/**
 * User
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Submission[] $submission
 */
class User extends Eloquent implements UserInterface, RemindableInterface {

		use UserTrait, RemindableTrait;

		/**
		 * The database table used by the model.
		 *
		 * @var string
		 */
		protected $table = 'users';

		/**
		 * The attributes excluded from the model's JSON form.
		 *
		 * @var array
		 */
		protected $hidden = array('password', 'remember_token');

		public function getAuthIdentifier(){
			return $this->getKey();
		}

		public function getAuthPassword(){
			return $this->password;
		}

		public function submission(){
			return $this->hasMany('Submission');
		}

		public function owns(Submission $submission){
			return $this->id == $submission->owner;
		}

		public function canEditPages(){
			if($this->is_user_level < 2 ){
				return true;
			}else{
				return false;
			}
		}
	}
