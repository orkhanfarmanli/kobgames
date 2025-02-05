<?php

define('ROOT_PATH', __DIR__);
define('VIEW_PATH', ROOT_PATH . '/app/Views/');

require 'vendor/autoload.php';
require 'app/Core/bootstrap.php';

use App\Core\Request;
use App\Core\Router;

Router::load('app/routes.php')->direct(Request::uri(), Request::method());
