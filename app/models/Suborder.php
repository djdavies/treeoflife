<?php

	class Suborder extends Classification{
		public $timestamps = false;
		protected $table = 'suborder';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function infraorder(){
			return $this->hasMany('Infraorder');
		}

		public function order(){
			return $this->belongsTo('Order');
		}

		public function parent() {
			return $this->order;
		}

		public function children() {
			return $this->infraorder;
		}

		public function child(){
			return 'infraorder';
		}
	}