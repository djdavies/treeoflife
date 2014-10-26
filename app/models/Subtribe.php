<?php

	class Subtribe extends Classification{
		public $timestamps = false;
		protected $table = 'subtribe';
		protected $guarded = ['id'];

		public function genus(){
			return $this->hasMany('Genus');
		}

		public function subfamily(){
			return $this->belongsTo('Subfamily');
		}

		public function parent() {
			return $this->subfamily;
		}

		public function children() {
			return $this->genus;
		}

		public function child(){
			return 'genus';
		}
	}