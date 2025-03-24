<?php

require_once '../../vendor/autoload.php';
use App\Repositories\ProductRepository;

if (!isset($_GET['id'])) {
    die('ID de producto no proporcionado.');
}

$productRepo = new ProductRepository();
$product = $productRepo->getProductById($_GET['id']);

if (!$product) {
    die('Producto no encontrado.');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    
    <?php include '../../layout/header.php'; ?>
    
    <main>
        <h1><?php echo htmlspecialchars($product['name']); ?></h1>
        <p><?php echo htmlspecialchars($product['description']); ?></p>
        <p>Precio: $<?php echo number_format($product['price'], 2); ?></p>
        <p>Stock disponible: <?php echo (int)$product['stock']; ?></p>
        <form action="/cart/add" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <label for="quantity">Cantidad:</label>
            <input type="number" name="quantity" id="quantity" min="1" max="<?php echo (int)$product['stock']; ?>" value="1" required>
            <button type="submit">Añadir al Carrito</button>
        </form>
    </main>
    <?php include '../../layout/footer.php'; ?>    
</body>
</html>
