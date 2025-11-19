<?php
// /core/Router.php

class Router {
    private $routes = [];

    public function addRoute($uri, $action) {
        $this->routes[$uri] = $action;
    }

    public function dispatch($uri) {
        if (array_key_exists($uri, $this->routes)) {
            list($controller, $method) = explode('@', $this->routes[$uri]);
            
            if (!class_exists($controller)) {
                http_response_code(500);
                die("Error: Controlador '{$controller}' no encontrado.");
            }

            $controllerInstance = new $controller();
            
            if (!method_exists($controllerInstance, $method)) {
                 http_response_code(500);
                 die("Error: Método '{$method}' no encontrado en el controlador '{$controller}'.");
            }
            
            return $controllerInstance->$method();
        }

        http_response_code(404);
        echo "404 - Ruta no encontrada: " . htmlspecialchars($uri);
    }
}