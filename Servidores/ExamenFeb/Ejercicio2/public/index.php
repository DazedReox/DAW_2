<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Core\Router;
use App\Controllers\CancionController;
use App\Controllers\ListaController;


$router = new Router();

$router->addRoute('GET', '/lista/{listaNombre}/canciones/{titulo}', [CancionController::class, 'getCancion']);
$router->addRoute('POST', '/lista/{listaNombre}/canciones', [CancionController::class, 'addCancion']);
$router->addRoute('DELETE', '/lista/{listaNombre}/canciones/{titulo}', [CancionController::class, 'deleteCancion']);

$router->addRoute('POST', '/login', [AuthController::class, 'login']);
$router->addRoute('GET', '/validate-token', [AuthController::class, 'validateToken']);

$router->addRoute('GET', '/listas', [ListaController::class, 'getAll']);
$router->addRoute('GET', '/listas/{nombre}', [ListaController::class, 'getByName']);
$router->addRoute('POST', '/listas', [ListaController::class, 'create']);
$router->addRoute('DELETE', '/listas/{nombre}', [ListaController::class, 'delete']);

foreach ($routes as $route => $handler) {
    list($method, $path) = explode(' ', $route, 2);
    $router->addRoute($method, $path, $handler);
}
$router->dispatch();

?>