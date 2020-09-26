<?php

require 'vendor/autoload.php';
require 'app/core/bootstrap.php';

use App\Core\Request;
use App\Core\Router;

Router::load('app/routes.php')->direct(Request::uri(), Request::method());
