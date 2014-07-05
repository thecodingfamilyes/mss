<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('username', 25)->unique();
			$table->string('display_name', 45)->nullable()->unique();
			$table->string('email', 60)->unique();
			$table->string('password', 80);
			$table->string('hash', 80);
			$table->string('status', 255);
			$table->string('rememeber_token', 100)-nullable();
			$table->datetime('logged_at')->nullable();
			$table->datetime('banned_at')->nullable();
			$table->datetime('ban_expires_at')->nullable();
			$table->softDeletes();
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
		Schema::drop('users');
	}

}
