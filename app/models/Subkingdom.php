<?php

	class Subkingdom extends Classification {
		public $timestamps = false;
		protected $table = 'subkingdom';
		protected $guarded = ['id'];

		public function superphylum(){
			return $this->hasMany('Superphylum');
		}

		public function kingdom(){
			return $this->belongsTo('Kingdom');
		}

		public function parent() {
			return $this->kingdom;
		}
		
		public function children() {
			return $this->superphylum;
		}

		public function child(){
			return 'superphylum';
		}
	}