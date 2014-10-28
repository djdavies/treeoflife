<?php

abstract class Classification extends Eloquent {
	protected $info = [];

	// gets the parent classifacation of a field
	abstract public function parent();

	// gets the children classifacation of a field
	abstract public function children();

	abstract public function getChildName();

	abstract public function getParentName();

    abstract public function getPossibleParents();

	//returns an empty array which will be used for getting specific fields
	public function info() {
		return $this->info;
	}

    public function selfUrl(){
        return URL::route('tree', [strtolower(get_class($this))]);
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
	public function parentUrl(){
		return URL::route('tree', [strtolower(get_class($this)).'/'.$this->id.'/children']);
	}

	//url for showing all items withing the classifications (crazy man)
	public function showChildren(){
		return URL::route('tree', [strtolower($this->getChildName())]);
	}
}