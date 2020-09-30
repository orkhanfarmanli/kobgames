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


/**
 * Check route global function
 * @param $route
 * @return bool
 */
function routeIsActive($route){
    return strpos($_SERVER['REQUEST_URI'], $route) !== false  ? 'active' : '';
}


