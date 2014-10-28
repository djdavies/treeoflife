<?php

	class Subcohort extends Classification{
		public $timestamps = false;
		protected $table = 'subcohort';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function magnorder(){
			return $this->hasMany('Magnorder');
		}

		public function infraclass(){
			return $this->belongsTo('Infraclass');
		}

		public function parent() {
			return $this->infraclass;
		}

		public function children() {
			return $this->magnorder;
		}

		public function getChildName(){
			return 'magnorder';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }
    }