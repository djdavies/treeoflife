<?php

	class Legion extends Classification{
		public $timestamps = false;
		protected $table = 'legion';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function sublegion(){
			return $this->hasMany('Sublegion');
		}

		public function superlegion(){
			return $this->belongsTo('Superlegion');
		}

		public function parent() {
			return $this->superlegion;
		}

		public function children() {
			return $this->sublegion;
		}

		public function child(){
			return 'sublegion';
		}
	}