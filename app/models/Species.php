<?php

class Species extends Classification{
	protected $table = "species";
	public $timestamps = false;
	protected $guarded = ['id'];
	protected $info = ['name', 'common_name', 'lived_from', 'lived_to', 
					   'lived_where', 'adult_height', 'adult_mass', 
					   'cranial_mass'];
	
	public function genus(){
		return $this->belongsTo('Genus');
	}

	public function parent() {
		return $this->genus;
	}

	public function children() {
		return $this;
	}

	public function child(){
			return null;
	}
}