<?php

/**
 * Description of KuveytturkFacade.php
 *
 * @author Ali Gençsoy <mail@aligencsoy.com>
 */

namespace AliGencsoy\LaravelKuveytturk;

use Illuminate\Support\Facades\Facade;

class KuveytturkFacade extends Facade {
	protected static function getFacadeAccessor() {
		return 'kuveytturk';
	}
}
