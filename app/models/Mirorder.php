<?php

	class Mirorder extends Classification{
		public $timestamps = false;
		protected $table = 'mirorder';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function order(){
			return $this->hasMany('Order');
		}

		public function grandorder(){
			return $this->belongsTo('Grandorder');
		}

		public function parent() {
			return $this->grandorder;
		}

		public function children() {
			return $this->order;
		}

		public function getChildName(){
			return 'order';
		}

        public function getParentName() {
            // TODO: Implement getParentName() method.
        }
    }