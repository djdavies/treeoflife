<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDescriptionToClassifications extends Migration {

	private $tables = [
		'domain',
		'kingdom',
		'subkingdom',
		'classes',
		'family',
		'genera',
		'grandorder',
		'infraclass',
		'infralegion',
		'infraorder',
		'infraphylum',
		'legion',
		'magnorder',
		'mirorder',
		'order',
		'parvorder',
		'phylum',
		'subclass',
		'subcohort',
		'subfamily',
		'sublegion',
		'suborder',
		'subphylum',
		'subtribe',
		'superclass',
		'superfamily',
		'superlegion',
		'superorder',
		'superphylum',
		'tribe'
	];

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		foreach ($this->tables as $tableName) {
			Schema::table($tableName, function ($table) {
				$table->text('description');
			});
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		foreach ($this->tables as $tableName) {
			Schema::table($tableName, function ($table) {
				$table->dropColumn('description');
			});
		}
	}

}
