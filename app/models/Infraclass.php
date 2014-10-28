<?php

	class Infraclass extends Classification{
		public $timestamps = false;
		protected $table = 'infraclass';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function subcohort(){
			return $this->hasMany('Subcohort');
		}

		public function subclass(){
			return $this->belongsTo('Subclass');
		}

		public function parent() {
			return $this->subclass;
		}

		public function children() {
			return $this->subcohort;
		}

		public function getChildName(){
			return 'subcohort';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }
    }