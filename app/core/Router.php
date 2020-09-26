<?php

namespace App\Core;

use Exception;

class Router
{
     public $routes = [
          'GET' => [],
          'POST' => [],
     ];

     public static function load($file)
     {
          $router = new static();
          require $file;
          return $router;
     }

     public function get($uri, $controller)
     {
          $this->routes['GET'][$uri] = $controller;
     }

     public function post($uri, $controller)
     {
          $this->routes['POST'][$uri] = $controller;
     }

     public function direct($uri, $requestType)
     {
          if (array_key_exists($uri, $this->routes[$requestType])) {
               return $this->callAction(
                    ...explode('@', $this->routes[$requestType][$uri])
               );
          }

          throw new Exception('Route doesn\'t exist');
     }

     public function callAction($controller, $action)
     {
          $controller = "App\\Controllers\\{$controller}";
          $controller = new $controller;

          if (!method_exists($controller, $action)) {
               throw new Exception("There is no such {$action} method of the {$controller} controller bruh");
          }

          return $controller->$action();
     }
}
