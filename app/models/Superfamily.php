<?php

	class Superfamily extends Classification{
		public $timestamps = false;
		protected $table = 'superfamily';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function family(){
			return $this->hasMany('Family');
		}

		public function parvorder(){
			return $this->belongsTo('Parvorder');
		}

		public function parent() {
			return $this->pravorder;
		}

		public function children() {
			return $this->family;
		}

		public function child(){
			return 'family';
		}
	}