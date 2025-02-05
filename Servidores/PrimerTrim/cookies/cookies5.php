<?php
$cookie_name = "usuario";

if (isset($_POST['crear_cookie'])) {
    $usuario = $_POST['nombre_usuario'];
    $duracion = intval($_POST['duracion']);

    if ($duracion >= 1 && $duracion <= 60) {
        setcookie($cookie_name, $usuario, time() + $duracion);
        $mensaje = "Cookie creada por $duracion segundos.";
    } else {
        $mensaje = "La duración debe estar entre 1 y 60 segundos.";
    }
}

if (isset($_POST['borrar_cookie'])) {
    setcookie($cookie_name, "", time() - 3600);
    $mensaje = "La cookie ha sido borrada.";
}
if (isset($_COOKIE[$cookie_name])) {
    $mensaje_cookie = "Hola, " . $_COOKIE[$cookie_name] . ". Bienvenido a nuestra página web.";
} else {
    $mensaje_cookie = "¡No hay ninguna cookie almacenada!";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Creación y Destrucción de Cookies</title>
</head>
<body>
    <h2>CREACION Y DESTRUCCION COOKIE</h2>
    
    <form method="post" action="">
        <label for="nombre_usuario">Nombre de usuario:</label>
        <input type="text" name="nombre_usuario" id="nombre_usuario" required>
        
        <br><br>
        
        <label for="duracion">Duración cookie (entre 1 y 60 segundos):</label>
        <input type="number" name="duracion" id="duracion" min="1" max="60" required>
        
        <br><br>
        
        <button type="submit" name="crear_cookie">Crear cookie</button>
        <button type="submit" name="borrar_cookie">Borrar cookie</button>
        <button type="submit" name="actualizar_pagina">Actualizar página</button>
    </form>
    
    <p><?php echo $mensaje ?? ''; ?></p>
    <p><?php echo $mensaje_cookie; ?></p>
</body>
</html>
