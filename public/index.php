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
$di = new \Phalcon\Di\FactoryDefault;
$app = new \Phalcon\Mvc\Application($di);

$config = config('app');

$providers = $config->path('providers')->toArray();
foreach ($providers as $provider) {
    $di->register(new $provider);
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
    $di->set('app', $app, true);
    (new \Snowair\Debugbar\ServiceProvider(BASE_PATH . '/config/debugbar.php'))->start(); // debugbar
    (new \Phalcon\Debug)->listen(true, true);
}

/*
|--------------------------------------------------------------------------
| Finishes
|--------------------------------------------------------------------------
*/
// $app->handle()->send();
echo $app->handle()->getContent();
