<?php

class RolesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('roles')->truncate();
        
		\DB::table('roles')->insert(array (
			0 => 
			array (
				'id' => '3',
				'name' => 'admin',
			),
			1 => 
			array (
				'id' => '2',
				'name' => 'moderator',
			),
			2 => 
			array (
				'id' => '1',
				'name' => 'user',
			),
		));
	}

}
