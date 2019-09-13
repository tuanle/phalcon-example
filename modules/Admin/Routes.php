<?php

namespace Modules\Admin;

use Phalcon\Mvc\Router\Group as RouterGroup;

class Routes extends RouterGroup
{
    /**
     * Initializes the route
     */
    public function initialize()
    {
        // Default paths
        $this->setPaths([
            'module'    => 'admin',
            'namespace' => 'Modules\Admin\Controllers',
        ]);

        // Default prefix
        $this->setPrefix('/admin');

        $this->addRoutes();
    }

    /**
     * Add routes
     */
    protected function addRoutes()
    {
        $this->addGet('/welcome', ['controller' => 'Welcome', 'action' => 'index'])
            ->setName('admin.login.form');
    }
}
