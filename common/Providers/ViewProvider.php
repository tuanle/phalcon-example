<?php

namespace Common\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Simple as SimpleView;
use Phalcon\Mvc\View\Engine\Volt;

class ViewProvider implements ServiceProviderInterface
{
    /**
     * Registers the service
     */
    public function register(DiInterface $di)
    {
         $di->set(
            'view',
            function ()
            {
                $view = new View();
                $view->disableLevel([
                    View::LEVEL_LAYOUT => true,
                ]);

                $view->registerEngines([
                    '.volt' => function($view, $di)
                    {
                        $volt = new Volt($view, $di);

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
            },
            true
        );
    }
}
