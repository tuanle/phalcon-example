<?php

return [

    'name' => getenv('APP_NAME'),

    /*
    |--------------------------------------------------------------------------
    | Autoloaded services
    |--------------------------------------------------------------------------
    */
    'services' => [
        "router"             => \Phalcon\Mvc\Router::class,
        "view"               => \Common\Services\View::class,
        "dispatcher"         => \Phalcon\Mvc\Dispatcher::class,
        "url"                => \Phalcon\Mvc\Url::class,
        "modelsManager"      => \Phalcon\Mvc\Model\Manager::class,
        "modelsMetadata"     => \Phalcon\Mvc\Model\MetaData\Memory::class,
        "response"           => \Phalcon\Http\Response::class,
        "cookies"            => \Phalcon\Http\Response\Cookies::class,
        "request"            => \Phalcon\Http\Request::class,
        "filter"             => \Phalcon\Filter::class,
        "escaper"            => \Phalcon\Escaper::class,
        "security"           => \Phalcon\Security::class,
        "crypt"              => \Phalcon\Crypt::class,
        "annotations"        => \Phalcon\Annotations\Adapter\Memory::class,
        "flash"              => \Phalcon\Flash\Direct::class,
        "flashSession"       => \Phalcon\Flash\Session::class,
        "tag"                => \Phalcon\Tag::class,
        "session"            => \Phalcon\Session\Adapter\Files::class,
        "sessionBag"         => \Phalcon\Session\Bag::class,
        "eventsManager"      => \Phalcon\Events\Manager::class,
        "transactionManager" => \Phalcon\Mvc\Model\Transaction\Manager::class,
        "assets"             => \Phalcon\Assets\Manager::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Application modules
    |--------------------------------------------------------------------------
    */
    'modules' => [
        'admin' => [
            'className' => 'Modules\Admin\Module',
            'path'      => BASE_PATH . '/modules/Admin/Module.php'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Defines routes
    |--------------------------------------------------------------------------
    */
    'routes' => [
        \Modules\Admin\Routes::class,
    ],
];
