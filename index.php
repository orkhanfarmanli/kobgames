<?php

require 'vendor/autoload.php';
require 'app/Core/bootstrap.php';

use App\Core\Request;
use App\Core\Router;

define('ROOT_PATH', __DIR__);
define('VIEW_PATH', ROOT_PATH . '/app/Views/');

Router::load('app/routes.php')->direct(Request::uri(), Request::method());
