<?php
namespace App\Core;

class Router {
    protected $routes = [];

    public function get($uri, $controller) {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller) {
        $this->routes['POST'][$uri] = $controller;
    }

    public function dispatch($uri, $method) {
        if (array_key_exists($uri, $this->routes[$method])) {
            $controllerAction = $this->routes[$method][$uri];
            list($controller, $action) = explode('@', $controllerAction);
            
            $controller = "App\Controllers\\$controller";
            $controller = new $controller();
            $controller->$action();
        } else {
            http_response_code(404);
            require __DIR__ . '/../Views/errors/404.php';
        }
    }
}