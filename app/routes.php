<?php

// Application page route
$router->get('', 'HomeController@index');

// PHP and Postgres task pages
$router->get('php-and-postgresql/second-task', 'PhpAndPostgresController@secondTask');
$router->get('php-and-postgresql/forth-task', 'PhpAndPostgresController@forthTask');
$router->get('php-and-postgresql/fifth-task', 'PhpAndPostgresController@fifthTask');
$router->get('php-and-postgresql/sixth-task', 'PhpAndPostgresController@sixthTask');
$router->get('php-and-postgresql/seventh-task', 'PhpAndPostgresController@seventhTask');

// Servers
$router->get('servers/first-and-second-task', 'ServersController@firstTask');

// Competence
$router->get('competence/first-task', 'CompetenceController@firstTask');


// Ajax routes
$router->get('feedbacks', 'AjaxController@feedbacks');

// Api routes
$router->post('api/store-feedback', 'ApiController@storeFeedback');