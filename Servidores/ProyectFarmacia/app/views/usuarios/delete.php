<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body>
    <h1>Eliminar Usuario</h1>
    <p>¿Estás seguro de que quieres eliminar al usuario <strong>Pedro Callejas</strong>?</p>
    <form action="/usuarios/delete/1" method="POST">
        <button type="submit">Eliminar</button>
        <a href="/usuarios">Cancelar</a>
    </form>
</body>
</html>
