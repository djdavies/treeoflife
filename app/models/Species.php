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

	public function getChildName(){
			return null;
	}

	public function childurl($id){
		return URL::route('tree', [strtolower(get_class($this)).'/'.$id]);
	}

    public function getParentName() {
        return 'Genus';
    }

    public function getPossibleParents() {
        return new Genus();
        //DB::table('genera')->select('id', 'name')->get()
    }
}