<?php

class UsersTableSeeder extends Seeder {
	public function run(){
		User::truncate();
		DB::table('users')->insert(array(
				[
					'username' => 'system', 
					'password' => Hash::make('Nintendo64'),
					'first_name' => null,
					'last_name' => null,
					'is_user_level' => 0
				],
			

		
				[
					'username' => 'StyleASD', 
					'password' => Hash::make('password'),
					'first_name' => 'Aled',
					'last_name' => 'Davies',
					'is_user_level' => 1
				])
		);
	}

}