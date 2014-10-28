<?php

	class Tribe extends Classification{
		public $timestamps = false;
		protected $table = 'tribe';
		protected $guarded = ['id'];
		protected $info = ['name'];

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

		public function getChildName(){
			return 'subtribe';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }