<?php

return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [
        'mysql' => [
            'host'     => env('DB_HOST', 'localhost'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD'),
            'dbname'   => env('DB_DATABASE'),
            'port'     => env('DB_PORT', 3306),
            'charset'  => env('DB_CHARSET', 'utf8mb4'),
        ],
    ],

];
