<?php

/**
 * @author Ali Gençsoy <mail@aligencsoy.com>
 */

namespace AliGencsoy\LaravelKuveytturk;

use Illuminate\Support\ServiceProvider;
use AliGencsoy\LaravelKuveytturk\Kuveytturk;

class KuveytturkServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind('kuveytturk', function($app) {
			return new Kuveytturk;
		});
	}
}
