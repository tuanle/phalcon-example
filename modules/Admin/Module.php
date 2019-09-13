<?php

namespace Modules\Admin;

use Phalcon\DiInterface;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Loader;

class Module implements ModuleDefinitionInterface
{
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
        $di->getView()->setViewsDir(BASE_PATH . '/modules/Admin/views');
    }
}
