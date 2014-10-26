<?php

class DomainSeeder extends Seeder{
	

	public function run(){
		$domainData = [
			'Archaea',
			'Bacteria'
		];

		foreach($domainData as $domain){
			DB::table('domain')->insert([
				['name' => $domain]
			]);
		}	
	}
}