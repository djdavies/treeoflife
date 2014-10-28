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
			return NULL;
		}

		public function children() {
			return $this->kingdoms;
		}

		public function getChildName(){
			return 'kingdom';
		}

		public function parentUrl(){
			return URL::route('tree', [strtolower(get_class($this->parent()))]);
		}

        public function getParentName(){
            return 'LUCA';
        }
    }