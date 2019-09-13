<?php

namespace Modules\Admin\Controllers;

use Phalcon\Mvc\Controller as PhalconMvcController;
use Phalcon\Mvc\Dispatcher;

/**
 * Base controller for Admin module
 */
class Controller extends PhalconMvcController
{

    public function beforeExecuteRoute(Dispatcher $dispatcher)
    {
    }

    public function initialize()
    {
    }

    public function afterExecuteRoute(Dispatcher $dispatcher)
    {
    }

}
