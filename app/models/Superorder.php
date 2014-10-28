<?php

	class Superorder extends Classification{
		public $timestamps = false;
		protected $table = 'superorder';
		protected $guarded = ['id'];
		protected $info = ['name'];
		
		public function grandorder(){
			return $this->hasMany('Grandorder');
		}

		public function mangorder(){
			return $this->belongsTo('Mangorder');
		}

		public function parent() {
			return $this->mangorder;
		}

		public function children() {
			return $this->grandorder;
		}

		public function getChildName(){
			return 'grandorder';
		}
	}