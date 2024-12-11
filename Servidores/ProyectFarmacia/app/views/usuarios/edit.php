<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Editar Usuario</h1>
    <form action="/usuarios/edit/1" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="Pedro Callejas" required>
        
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" value="pedro123" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password">
        <small>Deja en blanco si no deseas cambiarla</small>
        
        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="empleado" selected>Empleado</option>
            <option value="propietario">Propietario</option>
        </select>
        
        <button type="submit">Actualizar Usuario</button>
    </form>
</body>
</html>
