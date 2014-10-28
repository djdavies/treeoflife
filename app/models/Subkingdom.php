<?php

	class Subkingdom extends Classification {
		public $timestamps = false;
		protected $table = 'subkingdom';
		protected $guarded = ['id'];
		protected $info = ['name'];

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

		public function getChildName(){
			return 'superphylum';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }
    }