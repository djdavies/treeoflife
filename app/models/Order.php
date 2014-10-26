<?php

	class Order extends Classification{
		public $timestamps = false;
		protected $table = 'order';
		protected $guarded = ['id'];

		public function suborder(){
			return $this->hasMany('Suborder');
		}

		public function mirorder(){
			return $this->belongsTo('Mirorder');
		}

		public function parent() {
			return $this->mirorder;
		}

		public function children() {
			return $this->suborder;
		}

		public function child(){
			return 'suborder';
		}
	}