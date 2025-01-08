<?php 
    namespace Routes;
    use Controllers\AuthController;
    use Controllers\ErrorController;
    use Controllers\CarritoController;
    use Controllers\CategoriaController;
    use Controllers\PedidoControllers;
    use Controllers\ProductoControllers;
    use Lib\Router;

    Router::add('GET', '/not-found', function(){
        ErrorController::error404();
    });
?>