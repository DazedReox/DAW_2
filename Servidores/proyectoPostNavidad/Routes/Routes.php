<?php
namespace Routes;

    use Controllers\AuthController;
    use Controllers\ErrorController;
    use Controllers\CarritoController;
    use Controllers\CategoryController;
    use Controllers\PedidoControllers;
    use Controllers\ProductControllers;
    use Lib\Router;

    class Routes {
        public static function registerRoutes() {
            Router::add('GET', '/not-found', function() {
                ErrorController::error404();
            });

            Router::add('GET', '/', function() {
                echo '<h1>Página de inicio</h1>';
            });

            Router::add('GET', 'Products/formProduct', function() {
                ProductControllers::formProducto();
            });

            Router::add('POST', 'Products/formProduct', function() {
                ProductControllers::guardarProducto();
            });

            Router::add('GET', 'Categories/formCategory', function() {
                CategoryController::formCategoria();
            });

            Router::add('POST', 'Categories/formCategory', function() {
                CategoryController::guardarCategoria();
            });
        }
    }

    Routes::registerRoutes();
?>
