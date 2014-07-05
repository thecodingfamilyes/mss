<?php namespace Algm\Mss\Modules\User\Repositories;

/**
 * User repository interface
 */
interface UserRepository {

/**
 * Creates a new user
 */
	public function create($input);

/**
 * Gets an user by its id or the currently logged in user if available.
 */
	public function get($id);

/**
 * Builds a query and returns it for allowing execution
 */
	public function where();

}