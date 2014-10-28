<?php

	class Grandorder extends Classification{
		public $timestamps = false;
		protected $table = 'grandorder';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function mirorder(){
			return $this->hasMany('Mirorder');
		}

		public function superorder(){
			return $this->belongsTo('Superorder');
		}

		public function parent() {
			return $this->superorder;
		}

		public function children() {
			return $this->mirorder;
		}

		public function getChildName(){
			return 'mirorder';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }