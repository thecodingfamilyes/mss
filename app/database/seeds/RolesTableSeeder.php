<?php

class RolesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('roles')->insert(array (
			0 =>
			array (
				'id' => '3',
				'name' => 'admin',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			1 =>
			array (
				'id' => '2',
				'name' => 'moderator',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
			2 =>
			array (
				'id' => '1',
				'name' => 'user',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			),
		));
	}

}
