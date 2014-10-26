<?php

	class subfamily extends Classification{
		public $timestamps = false;
		protected $table = 'subfamily';
		protected $guarded = ['id'];

		public function tribe(){
			return $this->hasMany('Tribe');
		}

		public function family(){
			return $this->belongsTo('Family');
		}

		public function parent() {
			return $this->family;
		}

		public function children() {
			return $this->tribe;
		}

		public function child(){
			return 'tribe';
		}
	}