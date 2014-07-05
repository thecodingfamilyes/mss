<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttributablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attributables', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('attribute_id');
			$table->integer('value');
			$table->integer('attributable_id');
			$table->string('attributable_type', 100);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attributables');
	}

}
