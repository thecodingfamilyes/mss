<?php namespace Algm\Mss\Services;

use \Illuminate\Support\ServiceProvider;

/**
 * Provides repository services
 */
class RepositoryServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app->bind(
			'Algm\Mss\Modules\User\Repositories\UserRepository',
			'Algm\Mss\Modules\User\Repositories\ArdentUserRepository'
		);
	}
}