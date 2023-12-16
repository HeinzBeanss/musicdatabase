<?php

class Router {

    protected $routes = [];

    public function addRoute($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];
    }

    public function get($uri, $controller) {
        $this->addRoute("GET", $uri, $controller);
    }

    public function post($uri, $controller) {
        $this->addRoute("POST", $uri, $controller);
    }

    public function PUT($uri, $controller) {
        $this->addRoute("PUT", $uri, $controller);
    }

    public function DELETE($uri, $controller) {
        $this->addRoute("DELETE", $uri, $controller);
    }

    public function route($method, $uri) {
       
        foreach ($this->routes as $route) {
            if ($method === $route['method'] && $uri === $route['uri']) {
                return require base_path("controllers/{$route['controller']}");
            }
        }
        $this->abort(404);
    }

    public function abort($statuscode = 404) {
        require viewPage("views/$statuscode.view.php");
    }
}