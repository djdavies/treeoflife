<?php

	class Classes extends Classification{
		public $timestamps = false;
		protected $table = 'classes';
		protected $guarded = ['id'];

		public function superlegion(){
			return $this->hasMany('Superlegion');
		}

		public function superclass(){
			return $this->belongsTo('Superclass');
		}

		public function parent() {
			return $this->superclass;
		}

		public function children() {
			return $this->superlegion;
		}

		public function child(){
			return 'superlegion';
		}
	}