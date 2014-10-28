<?php

	class Infraphylum extends Classification{
		public $timestamps = false;
		protected $table = 'infraphylum';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function superclass(){
			return $this->hasMany('Superclass');
		}

		public function subphylum(){
			return $this->belongsTo('Subphylum');
		}

		public function parent() {
			return $this->subphylum;
		}

		public function children() {
			return $this->superclass;
		}

		public function getChildName(){
			return 'superclass';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }
    }