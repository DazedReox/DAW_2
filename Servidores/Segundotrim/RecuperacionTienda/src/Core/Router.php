<?php

namespace App\Core;

class Router{
    //nueva ruta
    public function add($method, $route, $action){
        $this->routes[] = [
            'method' => strtoupper($method),
            'route' => $route,
            'action' => $action
        ];
    }

    // Manejar la solicitud entrante
    public function dispatch($requestUri, $requestMethod)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === strtoupper($requestMethod) && preg_match("~^{$route['route']}$~", $requestUri, $matches)) {
                $action = explode('@', $route['action']);
                $controllerName = 'App\\Controllers\\' . $action[0];
                $methodName = $action[1];

                if (class_exists($controllerName) && method_exists($controllerName, $methodName)) {
                    $controller = new $controllerName();
                    array_shift($matches);
                    call_user_func_array([$controller, $methodName], $matches);
                    return;
                }
            }
        }

        //si no se encuentra
        http_response_code(404);
        echo '404 - Página no encontrada';
    }
    private $routes = [];

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function registerRoutes()
    {
        //aqui se cargan desde la db o archivo
    }

    function handleRequest() {
        //enrutador
    }

    private function callAction($action)
    {
        list($controller, $method) = $action;
        $controllerInstance = new $controller();
        $controllerInstance->$method();
    }
}
?>