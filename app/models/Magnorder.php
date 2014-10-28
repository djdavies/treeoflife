<?php

	class Magnorder extends Classification{
		public $timestamps = false;
		protected $table = 'magnorder';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function superorder(){
			return $this->hasMany('Superorder');
		}

		public function subcohort(){
			return $this->belongsTo('Subcohort');
		}

		public function parent() {
			return $this->subcohort;
		}

		public function children() {
			return $this->superorder;
		}

		public function getChildName(){
			return 'superorder';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }