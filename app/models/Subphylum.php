<?php

	class Subphylum extends Classification{
		public $timestamps = false;
		protected $table = 'subphylum';
		protected $guarded = ['id'];
		protected $info = ['name'];

		public function infraphylum(){
			return $this->hasMany('Infraphylum');
		}

		public function phylum(){
			return $this->belongsTo('Phylum');
		}

		public function parent() {
			return $this->phylum;
		}

		public function children() {
			return $this->infraphylum;
		}

		public function child(){
			return 'infraphylum';
		}
	}