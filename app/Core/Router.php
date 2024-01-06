<?php

namespace Core;

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

require base_path('Core/Middleware/Middleware.php');


class Router {

    protected $routes = [];

    public function addRoute($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
        
    }

    public function get($uri, $controller) {
        return $this->addRoute("GET", $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this->addRoute("POST", $uri, $controller);
    }

    public function PUT($uri, $controller) {
        return $this->addRoute("PUT", $uri, $controller);
    }

    public function DELETE($uri, $controller) {
        return $this->addRoute("DELETE", $uri, $controller);
    }

    public function only($key) {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($method, $uri) {
       
        foreach ($this->routes as $route) {
            if ($method === $route['method'] && $uri === $route['uri']) {
                Middleware::resolve($route['middleware']);

                return require base_path("controllers/{$route['controller']}");
            }
        }
        abort(404);
    }


}