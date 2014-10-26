<?php

abstract class Classification extends Eloquent {
	protected $info = [];

	// gets the parent classifacation of a field
	abstract public function parent();

	// gets the children classifacation of a field
	abstract public function children();

	abstract public function child();

	//returns an empty array which will be used for getting specific fields
	public function info() {
		return $this->info;
	}

	//return a url for use in the domains
	public function url() {
		return URL::route('tree', [strtolower(get_class($this))]);
	}

	public function childurl(){
		return URL::route('tree', [strtolower(get_class($this))], $this->id);
	}
}