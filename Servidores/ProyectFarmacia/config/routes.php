<?php
$routes = [
    //auth
    '/login' => ['AuthController', 'login'],
    '/register' => ['AuthController', 'register'],
    
    //prod
    '/productos' => ['ProductoController', 'index'],
    '/productos/create' => ['ProductoController', 'create'],
    '/productos/edit/([0-9]+)' => ['ProductoController', 'edit'],
    '/productos/delete/([0-9]+)' => ['ProductoController', 'delete'],
    
    //pedidos
    '/pedidos' => ['PedidoController', 'index'],
    '/pedidos/create' => ['PedidoController', 'create'],
    '/pedidos/notify/([0-9]+)' => ['PedidoController', 'notify'],
    
    //usuarios
    '/usuarios' => ['UsuarioController', 'index'],
    '/usuarios/create' => ['UsuarioController', 'create'],
    '/usuarios/edit/([0-9]+)' => ['UsuarioController', 'edit'],
    '/usuarios/delete/([0-9]+)' => ['UsuarioController', 'delete'],
    
    //ususario perfil
    '/perfil' => ['UsuarioController', 'updateProfile'],
];

function getRoute($uri)
{
    global $routes;
    
    foreach ($routes as $route => $action) {
        //verificacion
        if (preg_match("#^{$route}$#", $uri, $matches)) {
            return [$action, $matches];
        }
    }
    return null;
}
?>
