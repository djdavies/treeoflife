<?php

class GenusTableSeeder extends Seeder{
	public function run(){
		DB::table('genera')->insert(array(
			    array('id'=>1, 'name'=>"Homo"),
			    array('id'=>2, 'name'=>"Australopithecus")
	            )
		);
	}
}