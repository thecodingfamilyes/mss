<?php

class TitlesTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('titles')->truncate();
        
		\DB::table('titles')->insert(array (
			0 => 
			array (
				'id' => '8',
				'name' => 'Antigua',
			),
			1 => 
			array (
				'id' => '7',
				'name' => 'Fervorosa',
			),
			2 => 
			array (
				'id' => '13',
				'name' => 'Humilde',
			),
			3 => 
			array (
				'id' => '2',
				'name' => 'Ilustre',
			),
			4 => 
			array (
				'id' => '9',
				'name' => 'Ilustrísima',
			),
			5 => 
			array (
				'id' => '5',
				'name' => 'Inmemorial',
			),
			6 => 
			array (
				'id' => '4',
				'name' => 'Muy ilustre',
			),
			7 => 
			array (
				'id' => '10',
				'name' => 'Patriarcal',
			),
			8 => 
			array (
				'id' => '6',
				'name' => 'Pontificia',
			),
			9 => 
			array (
				'id' => '14',
				'name' => 'Primitiva',
			),
			10 => 
			array (
				'id' => '1',
				'name' => 'Real',
			),
			11 => 
			array (
				'id' => '3',
				'name' => 'Venerable',
			),
		));
	}

}
