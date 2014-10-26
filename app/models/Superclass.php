<?php

	class Superclass extends Classification{
		public $timestamps = false;
		protected $table = 'superclass';
		protected $guarded = ['id'];

		public function classes(){
			return $this->hasMany('Classes');
		}

		public function infraphylum(){
			return $this->belongsTo('Infraphylum');
		}

		public function parent() {
			return $this->infraphylum;
		}

		public function children() {
			return $this->classes;
		}

		public function child(){
			return 'classes';
		}
	}