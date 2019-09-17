<?php

namespace Common\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;
use Phalcon\Db\Adapter\Pdo\Mysql;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;

class SessionProvider implements ServiceProviderInterface
{
    /**
     * Registers the service
     */
    public function register(DiInterface $di)
    {
        $di->set('session', function () {
            $session = new SessionAdapter();
            $session->start();
            return $session;
        }, true);

        $di->set('flashSession', function () {
            return new FlashSession();
        });
    }
}
