<?php

namespace Modules\Admin\Controllers;

use Modules\Admin\Controllers\Controller as AdminController;
use Modules\Admin\Services\Interfaces\UserServiceInterface;

class WelcomeController extends AdminController
{
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * Build the services that will be used in this controller
     */
    protected function onConstruct()
    {
        $this->userService = $this->getDi()->get(UserServiceInterface::class);
    }

    public function indexAction()
    {
        $this->userService->listUser();
        $this->view->pick('welcome');
    }
}
