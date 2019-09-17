<?php

namespace Common\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Events\Event;
use Phalcon\Events\Manager as EventsManager;

class DispatcherProvider implements ServiceProviderInterface
{
    /**
     * Registers the service
     */
    public function register(DiInterface $di)
    {
        $di->set(
            'dispatcher',
            function () {
                // Create an event manager
                $eventsManager = new EventsManager();

                // Attach a listener for type 'dispatch'
                /*
                $eventsManager->attach(
                    'dispatch',
                    function (Event $event, $dispatcher) {
                        // ...
                    }
                );
                */

                $dispatcher = new MvcDispatcher();

                // Bind the eventsManager to the view component
                $dispatcher->setEventsManager($eventsManager);

                return $dispatcher;
            },
            true
        );
    }
}
