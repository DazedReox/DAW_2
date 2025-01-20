<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Registro</title>
</head>
<body>
    <?php 
        $cookie_name = $_SERVER["name"];
        $cookie_password = $_SERVER['password'];
        setcookie($cookie_name, $cookie_password, time() + (86400 * 30), "/");
    ?>
    <?php 
        if(!isset($_COOKIE[$cookie_name])) {
            echo "La cookie: " . $cookie_name . " no esta setteada";
        } else {
            echo "La cookie: " . $cookie_name . " esta setteada <br>";
            echo "El valor de la cookie nombre es: " . $_COOKIE[$cookie_name];
        }
        if(!isset($_COOKIE[$cookie_password])) {
            echo "La cookie password no ha podido settearse";
        } else {
            echo "La cookie password esta setteada <br>";
        }
    ?>
    <h1>Bienvenido al login/registro</h1>
    <p>Selecciona que quieres hacer</p>
    <br>
    <button><a href="../Views/FormLogin.php">Iniciar sesion</a></button>
    <br>
    <button><a href="../Views/FormRegister.php">Registrarse</a></button>
</body>
</html>