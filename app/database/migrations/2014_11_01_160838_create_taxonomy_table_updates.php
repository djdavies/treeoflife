<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaxonomyTableUpdates extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomies', function($table){
            $table->increments('id');
            $table->string('taxa_name');
        });

        Schema::table('taxa', function($table){
            $table->dropColumn('level');
            $table->integer('taxa_name')->references('id')->on('taxonomies')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('taxonomies');
        Schema::table('taxa', function($table){
	        $table->dropColumn( 'taxa_name' );
            $table->integer('level');
        });
	}
}
