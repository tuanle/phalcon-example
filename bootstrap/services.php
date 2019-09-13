<?php
/*
|--------------------------------------------------------------------------
| Dependency Injection
|--------------------------------------------------------------------------
*/
$di = new Phalcon\DI\FactoryDefault;

$di->set('router', function () {

    $router = new Phalcon\Mvc\Router();

    $router->setDefaultModule("admin");

    $router->add("/login", [
        'module'     => 'admin',
        'controller' => 'login',
        'action'     => 'form',
    ])->setName('admin-login');

    return $router;
});

// Registering the view component
$di->set('view', function () {
    $view = new \Phalcon\Mvc\View();

    // Set directory where places the views
    //$view->setViewsDir(APP_PATH . '/Modules/Admin/views');

    // Register Volt as template engine
    $view->registerEngines([
        '.volt' => function ($view, $di) {
            $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);

            $volt->setOptions([
                'compiledPath' => BASE_PATH . '/storage/app/views/',
                'compiledSeparator' => '_',
                'compileAlways' => getenv('APP_ENV') !== 'production' ? true : false,
            ]);

            $compiler = $volt->getCompiler();

            return $volt;
        }
    ]);

    return $view;
});

/*
|--------------------------------------------------------------------------
| Initializes the configuration
|--------------------------------------------------------------------------
*/
/*
$di->setShared('config', function() use ($di) {
    $config = new \Phalcon\Config([
        'app' => require_once(CONFIG_PATH . '/app.php'),
        // 'databases' => require_once(CONFIG_PATH . '/databases.php'),
    ]);

    return $config;
});

/*
|--------------------------------------------------------------------------
| Initializes the events manager and dispatcher
|--------------------------------------------------------------------------
*/
/*
$eventsManager = new Phalcon\Events\Manager;
$di->setShared('eventsManager', $eventsManager);

$di->setShared('dispatcher', function () use ($di, $eventsManager) {
    $dispatcher = new Phalcon\Mvc\Dispatcher;
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});

/*
|--------------------------------------------------------------------------
| Initializes the router
|--------------------------------------------------------------------------
*/
/*
$di->setShared('router', function() use ($di) {
    $router = new \Phalcon\Mvc\Router(false);
    $router->removeExtraSlashes(true);
    $router->add(
        '/:module/:controller/:action/:params',
        ['module' => 1, 'controller' => 2, 'action' => 3, 'params' => 4]
    );

    return $router;
});

/*
|--------------------------------------------------------------------------
| Initializes the view
|--------------------------------------------------------------------------
*/
/*
$di->set('view', function() use ($di) {
    $view = new Phalcon\Mvc\View();

    // Set directory where places the views
    //$view->setViewsDir(BASE_PATH . '/resources/views/');
        //$view->setViewsDir(APP_PATH . '/Modules/Admin/views');

    // Register Volt as template engine
    $view->registerEngines([
        '.volt' => function ($view, $di) {
            $volt = new Phalcon\Mvc\View\Engine\Volt($view, $di);

            $volt->setOptions([
                'compiledPath' => BASE_PATH . '/storage/app/views/',
                'compiledSeparator' => '_',
                'compileAlways' => getenv('APP_ENV') !== 'production' ? true : false,
            ]);

            $compiler = $volt->getCompiler();
            $compiler->addFunction('config', 'config');

            return $volt;
        }
    ]);

    return $view;
});
*/

/*
|--------------------------------------------------------------------------
| Finishes
|--------------------------------------------------------------------------
*/
return $di;
