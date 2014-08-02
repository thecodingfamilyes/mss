<?php

use Way\Tests\Factory;

class BrotherhoodModelTest extends TestCase {

	use Way\Tests\ModelHelpers;

	public function setUp() {
		parent::setUp();

		Brotherhood::boot();
	}

	public function testValidationFailsIfEmpty() {
		$brotherhood = new Brotherhood();

		$this->assertNotValid($brotherhood);
	}

	public function testBrotherhoodValidationPasses() {
		$brotherhood = $this->_getValidBrotherhood();

		$this->assertValid($brotherhood);
	}


	public function testBrotherhoodIsCreated() {
		$brotherhood = $this->_getValidBrotherhood();
		$this->assertTrue($brotherhood->save());
	}

	protected function _getValidBrotherhood($override = array()) {
		$user = Factory::user([
			'terms' => 1,
			'password' => 'user123',
			'password_confirmation' => 'user123'
		]);
		$user->save();

		$defaultOverride = [
			'name' => 'Ntro. Padre Jesús Cautivado y Mª Stma. del Desperdicio',
			'user_id' => $user->id,
			'day' => intval(round(rand(1, 8)))
		];

		$brotherhood = Factory::brotherhood(array_merge($defaultOverride, $override));

		//dd($brotherhood->toArray());

		return $brotherhood;
	}
}