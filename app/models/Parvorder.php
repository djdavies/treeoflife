<?php

	class Parvorder extends Classification{
		public $timestamps = false;
		protected $table = 'parvorder';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function superfamily(){
			return $this->hasMany('Superfamily');
		}

		public function infraorder(){
			return $this->belongsTo('Infraorder');
		}

		public function parent() {
			return $this->infraorder;
		}

		public function children() {
			return $this->superfamily;
		}

		public function getChildName(){
			return 'superfamily';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }