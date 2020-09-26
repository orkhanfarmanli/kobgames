<?php


return [
    'database' => [
        'name' => 'intelligence',
        'username' => 'john',
        'password' => 'pw123',
        'connection' => 'pgsql:host=127.0.0.1',
        'options' => [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
