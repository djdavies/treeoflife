<?php

	class subfamily extends Classification{
		public $timestamps = false;
		protected $table = 'subfamily';
		protected $guarded = ['id'];
		protected $info = ['name'];

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

		public function getChildName(){
			return 'tribe';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }