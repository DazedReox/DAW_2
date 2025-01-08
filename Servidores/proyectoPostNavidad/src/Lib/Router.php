<?php 
namespace Lib;

class Router {
    private static function index(){
        Router::add('GET', '/', function(){
            (new DashboardController())->index();
        });
        Router::add('GET', '/not-found', function(){
            ErrorController::error404();
        });

        Router::dispatch();
    }

    private static $routes = [];

    public static function add($method, $route, $callback) {
        self::$routes[] = [
            'method' => $method,
            'route' => $route,
            'callback' => $callback,
        ];
    }

    public static function dispatch($requestMethod, $requestUri) {
        foreach (self::$routes as $route) {
            if ($route['method'] === $requestMethod && $route['route'] === $requestUri) {
                call_user_func($route['callback']);
                return;
            }
        }
        echo "No route found for $requestMethod $requestUri";
    }
}
