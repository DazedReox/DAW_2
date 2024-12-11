<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Producto</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Añadir Producto</h1>
    <form action="/productos/create" method="POST">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" required>
        
        <button type="submit">Añadir Producto</button>
    </form>
</body>
</html>
