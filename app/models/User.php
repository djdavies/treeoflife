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

		public function getRememberToken(){
			return $this->remeber_token;
		}

		public function setRememberToken($remember_token){
			return $this->remember_token = $remember_token;
		}

		public function getRemeberTokenName(){
			return 'remeber_token';
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

		public function isSiteAdmin(){
			if($this->isAdmin == 3){
				return true;
			}else{
				return false;
			}
		}
	}
