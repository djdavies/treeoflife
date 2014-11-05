<?php
	/**
 * Created by PhpStorm.
 * 
 * User: User
 * Date: 01/11/2014
 * Time: 15:40
 *
 * @property-read \Taxon $taxon
 */

	class Taxonomy extends Eloquent {
		public $timestamps = false;

		public function taxon() {
			$this->belongsTo('Taxon');
		}
	}