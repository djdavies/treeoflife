<?php
	
	class Genus extends Classification{
		public $timestamps = false;
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function species(){
			return $this->hasMany('Species');
		}

		public function subtribe(){
			return $this->belongsTo('Subtribe');
		}

		public function parent() {
			return $this->subtribe;
		}

		public function children() {
			return $this->species;
		}

		public function getChildName(){
			return 'species';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }
    }