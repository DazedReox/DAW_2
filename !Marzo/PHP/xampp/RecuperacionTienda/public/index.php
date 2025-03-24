<?php

require_once '../vendor/autoload.php';
use App\Core\Router;

session_start();

$router = new Router();
$router->handleRequest();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <link rel="stylesheet" href="styles.css">
    <script src="js/scripts.js" defer></script>
</head>
<body>
    
    <?php include '../layout/header.php'; ?>
    
    <main>
        <h1>Bienvenido a la Tienda Online</h1>
        <p>Explora nuestros productos y realiza tu pedido fácilmente.</p>
        <a href="products/index.php" class="btn">Ver Productos</a>
    </main>
    
    <?php include '../layout/footer.php'; ?>
    
</body>
</html>
