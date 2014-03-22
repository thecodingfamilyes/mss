<?php

class VinculationsTableSeeder extends Seeder {

	/**
	 * Auto generated seed file
	 *
	 * @return void
	 */
	public function run()
	{
		\DB::table('vinculations')->truncate();
        
		\DB::table('vinculations')->insert(array (
			0 => 
			array (
				'id' => '1',
				'name' => 'Carmelitana',
			),
			1 => 
			array (
				'id' => '2',
				'name' => 'Trinitaria',
			),
			2 => 
			array (
				'id' => '3',
				'name' => 'Servita',
			),
			3 => 
			array (
				'id' => '4',
				'name' => 'Seráfica',
			),
			4 => 
			array (
				'id' => '5',
				'name' => 'Sacramental',
			),
			5 => 
			array (
				'id' => '6',
				'name' => 'Lasaliana',
			),
		));
	}

}
