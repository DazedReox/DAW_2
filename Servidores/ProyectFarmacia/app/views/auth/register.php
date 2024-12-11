<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Registrar Usuario</h1>
    <form action="/auth/register" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="empleado">Empleado</option>
            <option value="propietario">Propietario</option>
        </select>
        
        <button type="submit">Registrar</button>
    </form>
</body>
</html>