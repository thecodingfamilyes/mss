<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBrotherhoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('brotherhoods', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->string('name', 150);
			$table->string('shortname', 100)->nullable();
			$table->string('badge', 300)->nullable();
			$table->integer('day');
			$table->integer('vinculation_id')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('brotherhoods');
	}

}
