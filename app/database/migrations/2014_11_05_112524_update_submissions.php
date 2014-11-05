<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSubmissions extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::drop('submissions');

		Schema::create('submissions', function($table){
			$table->bigincrements('id');
			$table->text('comment');
			$table->string('type');
			$table->string('status');
			$table->biginteger('user_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('submissions');
		Schema::create('submissions', function($table){
			$table->bigincrements('id');
			$table->string('Submissions');
			$table->timestamps();
			$table->integer('user_id')
				->references('id')
				->on('users');
		});
	}

}
