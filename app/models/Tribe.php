<?php

	class Tribe extends Classification{
		public $timestamps = false;
		protected $table = 'tribe';
		protected $guarded = ['id'];

		public function subtribe(){
			return $this->hasMany('Subtribe');
		}

		public function family(){
			return $this->belongsTo('Subfamily');
		}

		public function parent() {
			return $this->subfamily;
		}

		public function children() {
			return $this->subtribe;
		}

		public function child(){
			return 'subtribe';
		}
	}