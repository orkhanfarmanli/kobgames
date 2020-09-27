<?php

$router->get('', 'PagesController@home');
$router->get('second-task', 'PagesController@secondTask');
$router->get('forth-task', 'PagesController@forthTask');
$router->get('fifth-task', 'PagesController@fifthTask');

$router->get('feedbacks', 'AjaxController@feedbacks');