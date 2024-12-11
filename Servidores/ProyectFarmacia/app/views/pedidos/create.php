<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pedido</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Registrar Pedido</h1>
    <form action="/pedidos/create" method="POST">
        <label for="cliente_email">Correo del Cliente:</label>
        <input type="email" id="cliente_email" name="cliente_email" required>
        
        <label for="producto_id">Producto:</label>
        <select id="producto_id" name="producto_id" required>
            <option value="1">Paracetamol 1gr</option>
            <option value="2">Ibuprofeno 400mg</option>
        </select>

        <button type="submit">Registrar Pedido</button>
    </form>
</body>
</html>
