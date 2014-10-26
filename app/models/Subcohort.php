<?php

	class Subcohort extends Classification{
		public $timestamps = false;
		protected $table = 'subcohort';
		protected $guarded = ['id'];

		public function magnorder(){
			return $this->hasMany('Magnorder');
		}

		public function infraclass(){
			return $this->belongsTo('Infraclass');
		}

		public function parent() {
			return $this->infraclass;
		}

		public function children() {
			return $this->magnorder;
		}

		public function child(){
			return 'magnorder';
		}
	}