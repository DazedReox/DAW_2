<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Registrar Usuario</h1>
    <form action="/Views/FormRegister.php" method="POST">
        <label for="name">Nombre/Usuario:</label>
        <input type="text" id="name" name="name" required>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <label for="password">Confirme Contraseña:</label>
        <input type="password" id="password2" name="password2" required>
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