<?php

use App\Core\App;
use App\Core\Database\Connection;
use App\Core\Database\QueryBuilder;

App::bind('config', require 'config.php');

try {
    App::bind('database', new QueryBuilder(
        Connection::make(App::get('config')['database'])
    ));
} catch (Exception $e) {
    throw $e;
}


