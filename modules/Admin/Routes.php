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
        $this->addGet('/users', ['controller' => 'Users', 'action' => 'index'])
            ->setName('admin.users.index');

        $this->addGet('/users/create', ['controller' => 'Users', 'action' => 'create'])
            ->setName('admin.users.create');

        $this->addPost('/users/create', ['controller' => 'Users', 'action' => 'create'])
            ->setName('admin.users.store');

        $this->addGet('/users/{id}/edit', ['controller' => 'Users', 'action' => 'edit'])
            ->setName('admin.users.edit');

        $this->addPost('/users/{id}/edit', ['controller' => 'Users', 'action' => 'edit'])
            ->setName('admin.users.update');
    }
}
