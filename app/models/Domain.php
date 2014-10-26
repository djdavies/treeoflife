<?php

	class Domain extends Classification {
		public $timestamps = false;
		protected $table = 'domain';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function kingdoms () {
			return $this->hasMany('Kingdom');
		}

		public function parent() {
			return 'LUCA';
		}

		public function children() {
			return $this->kingdoms;
		}

		public function child(){
			return 'kingdoms';
		}
	}