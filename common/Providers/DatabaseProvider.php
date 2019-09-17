<?php

namespace Common\Providers;

use Phalcon\Di\ServiceProviderInterface;
use Phalcon\DiInterface;
use Phalcon\Db\Adapter\Pdo\Mysql;

class DatabaseProvider implements ServiceProviderInterface
{
    /**
     * Registers the service
     */
    public function register(DiInterface $di)
    {
         $di->set(
            'db',
            function ()
            {
                $config = config('databases');
                $connectionType = $config->get('default');

                switch ($connectionType)
                {
                    case 'mysql':
                    default:
                        $connection = new Mysql($config->get('connections')->get($connectionType)->toArray());
                    break;
                }

                return $connection;
            }
        );
    }
}
