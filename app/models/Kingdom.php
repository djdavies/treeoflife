<?php

	class Kingdom extends Classification {
		public $timestamps = false;
		protected $table = 'kingdom';
		protected $guarded = ['id'];
		//returned in the abstract method
		protected $info = ['name'];

		public function subkingdom(){
			return $this->hasMany('Subkingdom');
		}

		public function domain(){
			return $this->belongsTo('Domain');
		}


		public function parent() {
			return $this->domain;
		}

		public function children() {
			return $this->subkingdom;
		}

		public function child(){
			return 'subkingdoms';
		}
	}