<?php 
namespace Lib;

class Router {
    private static function index(){
        Router::add('GET', '/', function(){
            (new DashboardController())->index();
        });
        Router::dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
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
