<?php
    require_once '../vendor/autoload.php';
    require_once '../config/config.php';

    $url = $_GET['url'] ?? '';
    $url = explode('/', trim($url, '/'));

    $controllerName = ucfirst($url[0] ?? 'Home') . 'Controller';
    $methodName = $url[1] ?? 'index';

    $controllerClass = "Controllers\\$controllerName";

    if (class_exists($controllerClass)) {
        $controller = new $controllerClass();
        if (method_exists($controller, $methodName)) {
            $controller->$methodName();
        } else {
            echo "No encontrado";
        }
    } else {
        echo "controllador no encontrado";
    }
?>