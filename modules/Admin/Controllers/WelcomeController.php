<?php

namespace Modules\Admin\Controllers;

use Modules\Admin\Controllers\Controller as AdminController;

class WelcomeController extends AdminController
{
    public function indexAction()
    {
        $this->view->pick('welcome');
    }
}
