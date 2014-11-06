<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('taxa', function($table){
            $table->engine ='MyISAM';
            $table->bigincrements('id');
            $table->string('name')->nulable();
            $table->string('scientific_name');
            $table->biginteger('parent_id')
                ->nullable()
                ->references('id')
                ->on('taxa_name');
            $table->integer('level');
            $table->string('summary');
            $table->text('description');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taxa');
	}

}
