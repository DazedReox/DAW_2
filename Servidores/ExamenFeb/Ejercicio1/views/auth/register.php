<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro de usuarios</h1>
    <form action="/auth/register" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="passwordConfirm">Confirmar Contraseña: </label>
        <input type="password" id="passwordConfirm" name="passwordConfirm" required>
        
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>