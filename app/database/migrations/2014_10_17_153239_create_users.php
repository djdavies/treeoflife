<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('users', function($table){
			$table->bigincrements('id');
			$table->string('username');
			$table->string('password');
			$table->string('first_name');
			$table->string('last_name');
			$table->integer('is_user_level');
			$table->string('remember_token')->nullable();
			$table->timestamps();
		});

		Schema::create('submissions', function($table){
			$table->bigincrements('id');
			$table->string('Submissions');
			$table->timestamps();
			$table->integer('user_id')
				->references('id')
				->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('submissions');
		Schema::drop('users');
	}

}
