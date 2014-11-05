<?php

	/**
 * Submission
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\User[] $users
 */
class Submission extends Eloquent{

		protected $fillable =array('submission');

		public function users(){
			return $this->hasMany('User');
		}
	}