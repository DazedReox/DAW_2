<?php

require_once '../../vendor/autoload.php';
use App\Repositories\ProductRepository;

$productRepo = new ProductRepository();
$products = $productRepo->getAllProducts();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>
<body>
    
    <?php include '../../layout/header.php'; ?>
    
    <main>
        <h1>Productos Disponibles</h1>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                    <p><?php echo htmlspecialchars($product['description']); ?></p>
                    <p>Precio: $<?php echo number_format($product['price'], 2); ?></p>
                    <a href="details.php?id=<?php echo $product['id']; ?>">Ver Detalles</a>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php include '../../includes/footer.php'; ?> 
</body>
</html>
