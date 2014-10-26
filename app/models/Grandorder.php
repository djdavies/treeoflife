<?php

	class Grandorder extends Classification{
		public $timestamps = false;
		protected $table = 'grandorder';
		protected $guarded = ['id'];

		public function mirorder(){
			return $this->hasMany('Mirorder');
		}

		public function superorder(){
			return $this->belongsTo('Superorder');
		}

		public function parent() {
			return $this->superorder;
		}

		public function children() {
			return $this->mirorder;
		}

		public function child(){
			return 'mirorder';
		}
	}