<?php

	class Sublegion extends Classification{
		public $timestamps = false;
		protected $table = 'sublegion';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function infralegion(){
			return $this->hasMany('Infralegion');
		}

		public function legion(){
			return $this->belongsTo('Legion');
		}

		public function parent() {
			return $this->legion;
		}

		public function children() {
			return $this->infralegion;
		}

		public function getChildName(){
			return 'infralegion';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }
    }
