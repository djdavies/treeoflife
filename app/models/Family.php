<?php

	class Family extends Classification{
		public $timestamps = false;
		protected $table = 'family';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function subfamily(){
			return $this->hasMany('Subfamily');
		}

		public function superfamily(){
			return $this->belongsTo('Superfamily');
		}

		public function parent() {
			return $this->superfamily;
		}

		public function children() {
			return $this->subfamily;
		}

		public function child(){
			return 'subfamily';
		}
	}