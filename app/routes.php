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
$router->get('competence/first-and-second-task', 'CompetenceController@firstAndSecondTask');

// Ajax routes
$router->get('feedbacks', 'AjaxController@feedbacks');
$router->get('games', 'AjaxController@games');
$router->get('game-details', 'AjaxController@gameDetails');

// Api routes
$router->post('api/store-feedback', 'ApiController@storeFeedback');