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

		$this->app->bind(
			'Algm\Mss\Modules\Brotherhood\Repositories\BrotherhoodRepository',
			'Algm\Mss\Modules\Brotherhood\Repositories\ArdentBrotherhoodRepository'
		);
	}
}