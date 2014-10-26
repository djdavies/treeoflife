<?php

	class Phylum extends Classification{
		public $timestamps = false;
		protected $table = 'phylum';
		protected $guarded = ['id'];

		public function subphylum(){
			return $this->hasMany('Subphylum');
		}

		public function superphylum(){
			return $this->belongsTo('Superphylum');
		}

		public function parent() {
			return $this->superphylum;
		}

		public function children() {
			return $this->subkingdom;
		}

		public function child(){
			return 'subphylum';
		}
	}