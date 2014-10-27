<?php

	class Superphylum extends Classification{
		public $timestamps = false;
		protected $table = 'superphylum';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function phylum(){
			return $this->hasMany('Phylum');
		}

		public function subkingdom(){
			return $this->belongsTo('Subkingdom');
		}

		public function parent() {
			return $this->subkingdom;
		}

		public function children() {
			return $this->phylum;
		}

		public function child(){
			return 'phylum';
		}
	}