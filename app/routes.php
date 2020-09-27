<?php

// Application page route
$router->get('', 'PagesController@home');
$router->get('second-task', 'PagesController@secondTask');
$router->get('forth-task', 'PagesController@forthTask');
$router->get('fifth-task', 'PagesController@fifthTask');

// Ajax routes
$router->get('feedbacks', 'AjaxController@feedbacks');

// Api routes
$router->post('store-feedback', 'ApiController@storeFeedback');