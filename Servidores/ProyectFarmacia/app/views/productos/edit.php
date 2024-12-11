<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="/productos/edit/1" method="POST">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" value="Paracetamol 1gr" required>
        
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" value="50" required>
        
        <label for="precio">Precio:</label>
        <input type="number" step="0.01" id="precio" name="precio" value="5.00" required>
        
        <button type="submit">Actualizar Producto</button>
    </form>
</body>
</html>
