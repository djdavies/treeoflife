<?php

	class Sublegion extends Classification{
		public $timestamps = false;
		protected $table = 'sublegion';
		protected $guarded = ['id'];

		public function infralegion(){
			return $this->hasMany('Infralegion');
		}

		public function legion(){
			return $this->belongsTo('Legion');
		}

		public function parent() {
			return $this->legion;
		}

		public function children() {
			return $this->infralegion;
		}

		public function child(){
			return 'infralegion';
		}
	}
