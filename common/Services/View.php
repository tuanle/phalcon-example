<?php

namespace Common\Services;

use Phalcon\Mvc\View as PhalconMvcView;
use Phalcon\Mvc\View\Engine\Volt;

class View extends PhalconMvcView
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        $this->registerEngines([
            '.volt' => function($view, $di)
            {
                $volt = new Volt($view, $di);

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
    }
}
