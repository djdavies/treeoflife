<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSubmissionsAndTaxa extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('submissions', function($table){
            $table->text('summary');
            $table->text('description');
            $table->text('contents');
            $table->dropColumn('Submissions');
            $table->biginteger('taxa_id');
        });

        Schema::table('taxa', function($table){
            $table->text('contents');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('submissions', function($table){
            $table->dropColumn('contents');
            $table->dropColumn('description');
            $table->dropColumn('summary');
            $table->dropColumn('taxa_id');
            $table->biginteger('Submissions');
        });
        Schema::table('taxa', function($table){
            $table->dropColumn('contents');
        });
	}

}
