<?php
$routes = [
    //auth
    '/login' => ['AuthController', 'login'],
    '/register' => ['AuthController', 'register'],
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
