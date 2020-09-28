<?php

// Application page route
$router->get('', 'HomeController@index');

// PHP and Postgres task pages
$router->get('php-and-postgres/second-task', 'PhpAndPostgresController@secondTask');
$router->get('php-and-postgres/forth-task', 'PhpAndPostgresController@forthTask');
$router->get('php-and-postgres/fifth-task', 'PhpAndPostgresController@fifthTask');
$router->get('php-and-postgres/sixth-task', 'PhpAndPostgresController@sixthTask');
$router->get('php-and-postgres/seventh-task', 'PhpAndPostgresController@seventhTask');

// Ajax routes
$router->get('feedbacks', 'AjaxController@feedbacks');

// Api routes
$router->post('api/store-feedback', 'ApiController@storeFeedback');