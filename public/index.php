<?php
/*
|--------------------------------------------------------------------------
| Define base directory's paths
|--------------------------------------------------------------------------
*/
define('BASE_PATH', dirname(__DIR__));

/*
|--------------------------------------------------------------------------
| Use the composer autoloader
|--------------------------------------------------------------------------
*/
require_once BASE_PATH . '/vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Registers environment parameters
|--------------------------------------------------------------------------
*/
\Dotenv\Dotenv::create(BASE_PATH)->load();

/*
|--------------------------------------------------------------------------
| Builds the application
|--------------------------------------------------------------------------
*/
$di = new \Phalcon\Di;
$app = new \Phalcon\Mvc\Application($di);

$config = config('app');

$services = $config->path('services')->toArray();
foreach ($services as $name => $service) {
    $di->set($name, $service, true);
}

$app->registerModules($config->path('modules')->toArray());

$routes = $config->path('routes')->toArray();
foreach ($routes as $route) {
    $di->getRouter()->mount(new $route);
}

if ('production' === getenv('APP_ENV')) {
    error_reporting(0);
} else {
    error_reporting(E_ALL);
    (new \Whoops\Run)->pushHandler(new \Whoops\Handler\PrettyPageHandler)->register(); // whoops
    $di->set('app', $app, true);
    (new \Snowair\Debugbar\ServiceProvider)->start(); // debugbar
}

/*
|--------------------------------------------------------------------------
| Finishes
|--------------------------------------------------------------------------
*/
$app->handle()->send();
