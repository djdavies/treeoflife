<?php

class Submission extends Eloquent{

	protected $fillable =array('submission');

	public function users(){
		return $this->hasMany('Users');
	}
}