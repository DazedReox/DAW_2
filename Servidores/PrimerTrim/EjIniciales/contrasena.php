<?php
session_start();

$correctPassword = "1234";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    if ($contraseña === $correctPassword) {
        $_SESSION['usuario'] = $usuario;
        echo "Bienvenido, " . htmlspecialchars($usuario);

        header("Location: Bienvenida.html");
    } else {
        $errorMessage = "Contraseña incorrecta.";    
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="post" action="">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" required><br><br>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>