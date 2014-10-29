<?php


    class Domain extends Eloquent{
		public $timestamps = false;
		protected $guarded = ['id'];

		public function kingdoms () {
			return $this->hasMany('Kingdom');
		}

		public function linksTable(){
            return $this->belongsTo('links_table');
        }
    }