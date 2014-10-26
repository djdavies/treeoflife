<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHomoAndGenusTable extends Migration {

	/**
	 * Run the migrations.
	 * 'name', 'common_name', 'lived_from', 'lived_to', 'lived_where', 'adult_height',
	 * 'adult_mass', 'cranial_mass', 'discovered', 'info', 'genus_id'
	 * 
	 * @return void
	 */
	public function up(){
		Schema::create('species', function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('common_name');
			$table->biginteger('lived_from');
			$table->biginteger('lived_to');
			$table->string('lived_where');
			$table->float('adult_height');
			$table->float('adult_mass');
			$table->float('cranial_mass');
			$table->date('discovered');
			$table->text('description');
			$table->biginteger('genus_id')->nullable();
		});

		Schema::create('genera', function($table){
			$table->bigincrements('id');
			$table->string('name');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('species');
		Schema::drop('genera');
	}

}
