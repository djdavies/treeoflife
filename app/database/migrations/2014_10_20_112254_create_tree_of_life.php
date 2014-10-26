<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreeOfLife extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('domain', function($table){
			$table->bigIncrements('id');
			$table->string('name');
		});

		Schema::create('kingdom', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('domain_id')->references('id')->on('domain');
		});

		Schema::create('subkingdom', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('kingdom_id')->references('id')->on('kingdom');
		});

		Schema::create('superphylum', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('subkingdom_id')->references('id')->on('subkingdom');
		});

		Schema::create('phylum', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('superphylum_id')->references('id')->on('superphylum');
		});

		Schema::create('subphylum', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('phylum_id')->references('id')->on('phylum');
		});

		Schema::create('infraphylum', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('subphylum_id')->references('id')->on('subphylum');
		});

		Schema::create('superclass', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('infraphylum_id')->references('id')->on('infraphylum');
		});

		Schema::create('classes', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('superclass_id')->references('id')->on('superclass');
		});

		Schema::create('superlegion', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('classes_id')->references('id')->on('classes');
		});

		Schema::create('legion', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('superlegion_id')->references('id')->on('superlegion');
		});

		Schema::create('sublegion', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('legion_id')->references('id')->on('legion');
		});

		Schema::create('infralegion', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('sublegion_id')->references('id')->on('sublegion');
		});

		Schema::create('subclass', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('infralegion_id')->references('id')->on('infralegion');
		});

		Schema::create('infraclass', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('subclass_id')->references('id')->on('subclass');
		});

		Schema::create('subcohort', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('infraclass_id')->references('id')->on('infraclass');
		});

		Schema::create('magnorder', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('subcohort_id')->references('id')->on('subcohort');
		});		

		Schema::create('superorder', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('magnorder_id')->references('id')->on('magnorder');
		});

		Schema::create('grandorder', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('superorder_id')->references('id')->on('superorder');
		});

		Schema::create('mirorder', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('grandorder_id')->references('id')->on('grandorder');
		});

		Schema::create('order', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('mirorder_id')->references('id')->on('mirorder');
		});
		
		Schema::create('suborder', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('order_id')->references('id')->on('order');
		});

		Schema::create('infraorder', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('suborder_id')->references('id')->on('suborder');
		});


		Schema::create('parvorder', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('infraorder_id')->references('id')->on('infraorder');
		});


		Schema::create('superfamily', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('parvorder_id')->references('id')->on('parvorder');
		});

		Schema::create('family', function($table){
					$table->bigIncrements('id');
					$table->string('name');
					$table->bigInteger('superfamily_id')->references('id')->on('superfamily');
		});

		Schema::create('subfamily', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('family_id')->references('id')->on('family');
		});
		
		Schema::create('tribe', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('subfamily_id')->references('id')->on('subfamily');
		});

		Schema::create('subtribe', function($table){
			$table->bigIncrements('id');
			$table->string('name');
			$table->bigInteger('tribe_id')->references('id')->on('tribe');
		});
		
		Schema::table('genera', function($table){
					$table->bigInteger('subtribe_id')->references('id')->on('subtribe');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('domain');
		Schema::drop('kingdom');
		Schema::drop('subkingdom');
		Schema::drop('superphylum');
		Schema::drop('phylum');
		Schema::drop('subphylum');
		Schema::drop('infraphylum');
		Schema::drop('superclass');
		Schema::drop('classes');
		Schema::drop('superlegion');
		Schema::drop('legion');
		Schema::drop('sublegion');
		Schema::drop('infralegion');
		Schema::drop('subclass');
		Schema::drop('infraclass');
		Schema::drop('subcohort');
		Schema::drop('magnorder');
		Schema::drop('superorder');
		Schema::drop('grandorder');
		Schema::drop('mirorder');
		Schema::drop('order');
		Schema::drop('suborder');
		Schema::drop('infraorder');
		Schema::drop('parvorder');
		Schema::drop('superfamily');
		Schema::drop('family');
		Schema::drop('subfamily');
		Schema::drop('tribe');
		Schema::drop('subtribe');
	}

}
