<?php

abstract class Classification extends Eloquent {
	protected $info = [];

	// gets the parent classifacation of a field
	abstract public function parent();

	// gets the children classifacation of a field
	abstract public function children();

	abstract public function child();

	abstract public function getParentName();

	//returns an empty array which will be used for getting specific fields
	public function info() {
		return $this->info;
	}

	//url for viewing details of the specific classification
	public function childurl($id){
		return URL::route('tree', [strtolower(get_class($this)).'/'.$id]);
	}

	//url for viewing all the children in a classification
	public function childrenurl($id){
		return URL::route('tree', [strtolower(get_class($this)).'/'.$id.'/children']);
	}

	//url to move up a level from the current level of the currant classification
	public function parenturl(){
		return URL::route('tree', [strtolower(get_class($this)).'/'.$this->id.'/children']);
	}

	//url for showing all items withing the classifications (crazy man)
	public function showChildren(){
		return URL::route('tree', [strtolower($this->child())]);	
	}
}