<?php

	class Superlegion extends Classification{
		public $timestamps = false;
		protected $table = 'superlegion';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function legion(){
			return $this->hasMany('Legion');
		}

		public function classes(){
			return $this->belongsTo('Classes');
		}

		public function parent() {
			return $this->classes;
		}

		public function children() {
			return $this->legion;
		}

		public function getChildName(){
			return 'legion';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }

        public function getPossibleParents() {
            // TODO: Implement getPossibleParents() method.
        }
    }