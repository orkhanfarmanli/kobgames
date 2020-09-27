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
 * Global view function
 * @param $view
 * @param array $data
 */
function view($view, $data = []){
    extract($data);

    require "app/Views/$view.view.php";
}

/**
 * Global redirect
 * @param $location
 */
function redirect($location)
{
     header("Location:/{$location}");
}
