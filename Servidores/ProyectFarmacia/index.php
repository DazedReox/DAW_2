<?php
require_once 'config/config.php';
require_once 'app/Controllers/AuthController.php';
require_once 'app/Models/Usuario.php';

$url = $_SERVER['REQUEST_URI'];
switch ($url) {
    case '/':
    case '/index':
        $controller = new App\Controllers\AuthController();
        $controller->showLoginForm();
        break;
    
    case '/login':
        $controller = new App\Controllers\AuthController();
        $controller->login();
        break;

    case '/productos':
        $controller = new App\Controllers\ProductoController();
        $controller->index();
        break;

    default:
        echo "Página no encontrada";
        break;
}
?>
