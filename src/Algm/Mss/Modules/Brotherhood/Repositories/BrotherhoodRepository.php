<?php namespace Algm\Mss\Modules\Brotherhood\Repositories;

/**
 * User repository interface
 */
interface BrotherhoodRepository {

/**
 * Creates a new brotherhood
 */
	public function create($input);

/**
 * Gets a brotherhood by its id
 */
	public function get($id);

/**
 * Builds a query and returns it for allowing execution
 */
	public function where();

/**
 * Gets all brotherhoods owned by the current user or the passed one
 */
	public function user($user);

}