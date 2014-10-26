<?php

	class Magnorder extends Classification{
		public $timestamps = false;
		protected $table = 'magnorder';
		protected $guarded = ['id'];

		public function superorder(){
			return $this->hasMany('Superorder');
		}

		public function subcohort(){
			return $this->belongsTo('Subcohort');
		}

		public function parent() {
			return $this->subcohort;
		}

		public function children() {
			return $this->superorder;
		}

		public function child(){
			return 'superorder';
		}
	}