<?php

	class Infralegion extends Classification{
		public $timestamps = false;
		protected $table = 'infralegion';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function subclass(){
			return $this->hasMany('Subclass');
		}

		public function sublegion(){
			return $this->belongsTo('Sublegion');
		}

		public function parent() {
			return $this->sublegion;
		}

		public function children() {
			return $this->subclass;
		}

		public function child(){
			return 'subclass';
		}
	}