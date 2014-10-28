<?php

	class Infraorder extends Classification{
		public $timestamps = false;
		protected $table = 'infraorder';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function parvorder(){
			return $this->hasMany('Parvorder');
		}

		public function suborder(){
			return $this->belongsTo('Suborder');
		}

		public function parent() {
			return $this->suborder;
		}

		public function children() {
			return $this->parvorder;
		}

		public function getChildName(){
			return 'parvorder';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }