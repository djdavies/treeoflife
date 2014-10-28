<?php

	class Superphylum extends Classification{
		public $timestamps = false;
		protected $table = 'superphylum';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function phylum(){
			return $this->hasMany('Phylum');
		}

		public function subkingdom(){
			return $this->belongsTo('Subkingdom');
		}

		public function parent() {
			return $this->subkingdom;
		}

		public function children() {
			return $this->phylum;
		}

		public function getChildName(){
			return 'phylum';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }