<?php

namespace Modules\Admin;

use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Loader;

use Modules\Admin\Services\Interfaces as AdminServiceInterfaces;
use Modules\Admin\Services as AdminServices;

class Module implements ModuleDefinitionInterface
{
    /**
     * @var array
     */
    protected $services = [
        AdminServiceInterfaces\UserServiceInterface::class => AdminServices\UserService::class,
    ];

    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces([
            'Modules\Admin\Controllers' => BASE_PATH . '/modules/Admin/Controllers/',
        ]);

        $loader->register();
    }

    /**
     * Register specific services for the module
     */
    public function registerServices(DiInterface $di)
    {
        // Registers dispatcher's default namespace
        $di->getDispatcher()->setDefaultNamespace('Modules\Admin\Controllers\\');

        // Registers view directory
        $di->getView()->setViewsDir(BASE_PATH . '/modules/Admin/views/');

        // Registers assets
        $di->getAssets()->addCss('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css', false, false);

        // Registers module services
        foreach ($this->services as $interface => $service) {
            $di->set($interface, $service, true);
        }
    }
}
