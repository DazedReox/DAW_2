<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Listado de Usuarios</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Pedro Callejas</td>
                <td>pedro123</td>
                <td>Empleado</td>
                <td>
                    <a href="/usuarios/edit/1">Editar</a> | <a href="/usuarios/delete/1">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ana López</td>
                <td>ana456</td>
                <td>Propietario</td>
                <td>
                    <a href="/usuarios/edit/2">Editar</a> | <a href="/usuarios/delete/2">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>
    
    <a href="/usuarios/create">Añadir nuevo usuario</a>
</body>
</html>
