<?php namespace Algm\Mss\Repositories\User;

use \User;

/**
 * Users repository that uses an ardent model
 */
class ArdentUserRepository implements UserRepository
{

/**
 * Creates a new user using Ardent goodies (no input required)
 *
 * @param array $input Data from which to create the user
 * @return User model
 */
	public function create($input = array()) {
		$user = new User;

		$success = $user->save();

		return array(
			$success, $user
		);
	}

/**
 * Gets an user by its id or the currently logged in user if available.
 * If you pass an array of ids, you will get a collection of users
 */
	public function get($id = null) {
		if (!$id) {
			return Auth::user();
		}

		if (is_array($id)) {
			return User::whereIn('id', $id)->get();
		}

		return User::find($id);
	}
}