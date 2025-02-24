<?php

use App\Controllers\AuthController;
use App\Controllers\ListaController;
use App\Controllers\CancionController;

return [
    // Autenticación
    'POST /login' => [AuthController::class, 'login'],
    'GET /validate-token' => [AuthController::class, 'validateToken'],

    // Listas de reproducción
    'GET /listas' => [ListaController::class, 'getAll'],
    'GET /listas/{nombre}' => [ListaController::class, 'getByName'],
    'POST /listas' => [ListaController::class, 'create'],
    'DELETE /listas/{nombre}' => [ListaController::class, 'delete'],

    // Canciones
    'GET /listas/{listaNombre}/canciones/{titulo}' => [CancionController::class, 'getCancion'],
    'POST /listas/{listaNombre}/canciones' => [CancionController::class, 'addCancion'],
    'DELETE /listas/{listaNombre}/canciones/{titulo}' => [CancionController::class, 'deleteCancion'],
];
?>