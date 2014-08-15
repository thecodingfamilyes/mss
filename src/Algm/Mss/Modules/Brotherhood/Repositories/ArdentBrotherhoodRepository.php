<?php namespace Algm\Mss\Modules\Brotherhood\Repositories;

use \Brotherhood;
use \App;
use \Auth;

/**
 * Brotherhoods repository that uses an ardent model
 */
class ArdentBrotherhoodRepository implements BrotherhoodRepository
{

/**
 * Creates a new Brotherhood using Ardent goodies (no input required)
 *
 * @param array $input Data from which to create the Brotherhood
 * @return Brotherhood model
 */
	public function create($input = array()) {
		$Brotherhood = new Brotherhood($input);
		$user = 1;
		if (Auth::check()) {
			$user = Auth::user()->id;
		}
		$Brotherhood->user_id = $user;

		$success = $Brotherhood->save();

		return array(
			$success, $Brotherhood
		);
	}

/**
 * Gets an Brotherhood by its id or the currently logged in Brotherhood if available.
 * If you pass an array of ids, you will get a collection of Brotherhoods
 */
	public function get($id = null) {
		if (!$id) {
			return Auth::Brotherhood();
		}

		if (is_array($id)) {
			return Brotherhood::whereIn('id', $id)->get();
		}

		return Brotherhood::find($id);
	}

/**
 * Builds a query and returns it for allowing execution
 */
	public function where() {
		return Brotherhood::where(func_get_args());
	}

/**
 * Gets the brotherhoods owned by an user
 */
	public function user($user = null) {
		if (!$user && Auth::check()) {
			$user = Auth::user()->id;
		}

		return Brotherhood::forUser($user)->limit(3)->get();
	}

}