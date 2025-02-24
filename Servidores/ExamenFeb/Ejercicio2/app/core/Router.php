<?php

namespace App\Core;

class Router
{
    private $routes = [];

    public function addRoute($method, $path, $handler)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function dispatch()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes as $route) {
            $pattern = $this->convertToRegex($route['path']);

            if ($route['method'] === $requestMethod && preg_match($pattern, $requestUri, $matches)) {
                $params = array_slice($matches, 1);

                //llama al controller
                $handler = $route['handler'];
                $controller = new $handler[0]();
                $method = $handler[1];
                call_user_func_array([$controller, $method], $params);
                return;
            }
        }

        http_response_code(404);
        echo json_encode(['error' => 'Ruta no encontrada']);
    }

    private function convertToRegex($path)
    {
        //se convierte a expresion regular
        $pattern = preg_replace('/\{([^}]+)\}/', '(?P<\1>[^/]+)', $path);
        return '@^' . $pattern . '$@';
    }
}
?>