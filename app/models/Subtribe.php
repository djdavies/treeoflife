<?php

	class Subtribe extends Classification{
		public $timestamps = false;
		protected $table = 'subtribe';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function genus(){
			return $this->hasMany('Genus');
		}

		public function subfamily(){
			return $this->belongsTo('Subfamily');
		}

		public function parent() {
			return $this->subfamily;
		}

		public function children() {
			return $this->genus;
		}

		public function getChildName(){
			return 'genus';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }