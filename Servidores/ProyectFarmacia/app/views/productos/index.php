<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Listado de Productos</h1>
    <form action="/productos/search" method="GET">
        <input type="text" name="search" placeholder="Buscar medicamento..." />
        <button type="submit">Buscar</button>
    </form>
    
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Paracetamol 1gr</td>
                <td>50</td>
                <td>$5.00</td>
                <td><a href="/productos/edit/1">Editar</a> | <a href="/productos/delete/1">Eliminar</a></td>
            </tr>
            <tr>
                <td>Ibuprofeno 400mg</td>
                <td>30</td>
                <td>$4.50</td>
                <td><a href="/productos/edit/2">Editar</a> | <a href="/productos/delete/2">Eliminar</a></td>
            </tr>
        </tbody>
    </table>
    
    <a href="/productos/create">Añadir nuevo producto</a>
</body>
</html>
