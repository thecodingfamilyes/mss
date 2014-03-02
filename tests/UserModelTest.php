<?php

use Way\Tests\Factory;

class UserModelTest extends TestCase {

	use Way\Tests\ModelHelpers;

	public function testValidationFailsIfEmpty() {
		$user = new User();

		$this->assertNotValid($user);
	}

	public function testValidationFailsIfPasswordMissmatch() {
		$user = $this->_getValidUser(['password_confirmation' => 'not matching password']);

		$this->assertNotValid($user);
	}

	public function testUserValidationPasses() {
		$user = $this->_getValidUser();

		$this->assertValid($user);
	}

	public function testValidationFailsWhenTermsNotAccepted() {
		$user = $this->_getValidUser(['terms' => 0]);

		$this->assertNotValid($user);
	}

	public function testValidationFailsWhenUsernameExists() {
		$user1 = Factory::create('User', [
			'password' => 'test',
			'password_confirmation' => 'test',
			'terms' => 1
		]);

		$user2 = $this->_getValidUser(['username' => $user1->username]);

		$this->assertNotValid($user2);
	}

	public function testValidationFailsWhenEmailExists() {
		$user1 = Factory::create('User', [
			'password' => 'test',
			'password_confirmation' => 'test',
			'terms' => 1
		]);

		$user2 = $this->_getValidUser(['email' => $user1->email]);
		$this->assertNotValid($user2);
	}

	public function testValidationFailsWhenUsernameHasWeirdCharacters() {
		$user = $this->_getValidUser(['username' => 'tengo espacios']);
		$this->assertNotValid($user);

		$user->username = '@@½!';
		$this->assertNotValid($user);
	}

	public function testUserIsCreated() {
		$user = $this->_getValidUser();
		$this->assertTrue($user->save());
	}

	public function testHasUserRoleOnCreate() {
		$user = Factory::create('User', [
			'password' => 'test',
			'password_confirmation' => 'test',
			'terms' => 1
		]);

		$user->afterCreate();

		$this->assertTrue($user->hasRole('user'));
	}

	protected function _getValidUser($override = array()) {
		$defaultOverride = [
			'terms' => 1
		];

		$user = Factory::user(array_merge($defaultOverride, $override));

		if (!isset($override['password_confirmation'])) {
			$user->password_confirmation = $user->password;
		}

		return $user;
	}
}