<?php namespace Algm\Mss\Services;

use \Illuminate\Support\ServiceProvider;

/**
 * Provides repository services
 */
class RepositoryServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Algm\Mss\Repositories\User\UserRepository',
			'Algm\Mss\Repositories\User\ArdentUserRepository'
		);
	}
}