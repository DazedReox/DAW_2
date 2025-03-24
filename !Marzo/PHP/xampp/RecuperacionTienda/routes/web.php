<?php
// routes/web.php

use App\Controllers\ProductController;
use App\Controllers\OrderController;
use App\Controllers\UserController;
use App\Controllers\CartController;
use App\Core\Router;

$router = new Router();

// Definir las rutas
$router->get('/', [ProductController::class, 'index']);
$router->get('/products', [ProductController::class, 'index']);
$router->get('/products/show', [ProductController::class, 'show']);
$router->get('/orders/status', [OrderController::class, 'status']);
$router->get('/users/login', [UserController::class, 'login']);
$router->post('/users/login', [UserController::class, 'authenticate']);
$router->get('/users/register', [UserController::class, 'register']);
$router->post('/users/register', [UserController::class, 'store']);
$router->get('/cart', [CartController::class, 'index']);
$router->post('/cart/add', [CartController::class, 'add']);
$router->post('/cart/remove', [CartController::class, 'remove']);

return $router;