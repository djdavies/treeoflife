<?php

	class Infraphylum extends Classification{
		public $timestamps = false;
		protected $table = 'infraphylum';
		protected $guarded = ['id'];

		public function superclass(){
			return $this->hasMany('Superclass');
		}

		public function subphylum(){
			return $this->belongsTo('Subphylum');
		}

		public function parent() {
			return $this->subphylum;
		}

		public function children() {
			return $this->superclass;
		}

		public function child(){
			return 'superclass';
		}
	}