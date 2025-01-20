<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesion</h1>
    <form action="/Views/FormLogin.php" method="POST">
        <label for="name">Usuario:</label>
        <input type="text" id="name" name="name" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
    </form>
    <?php 
        if($_SERVER['passwordOk']){
            echo '<button><a href= "../public/correos.php">Terminar</a><button>';
        }else{
            echo 'Faltan campos por rellenar';
        }
    ?>
</body>
</html>
