<?php

return [
    'connections' => [
        'mysql' => [
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', null),
            'username' => env('DB_USERNAME', null),
            'password' => env('DB_PASSWORD', null),
        ],
    ],
];
