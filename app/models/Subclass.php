<?php

	class Subclass extends Classification{
		public $timestamps = false;
		protected $table = 'subclass';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function infraclass(){
			return $this->hasMany('Infraclass');
		}

		public function infralegion(){
			return $this->belongsTo('Infralegion');
		}

		public function parent() {
			return $this->infralegion;
		}

		public function children() {
			return $this->infraclass;
		}

		public function getChildName(){
			return 'infraclass';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }
    }