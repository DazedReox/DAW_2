<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Pedidos</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Listado de Pedidos</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>pedro@example.com</td>
                <td>Paracetamol 1gr</td>
                <td>Pendiente</td>
                <td>
                    <a href="/pedidos/notify/1">Notificar al Cliente</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
