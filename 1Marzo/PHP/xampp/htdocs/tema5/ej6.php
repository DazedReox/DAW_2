<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 6</title>
</head>
<body>
    <form action="" method="POST">
        Introduce tu nombre: 
        <br>
        <input type="text" name="name">
        <br>
        Introduce tu numero de tlf:
        <br>
        <input type="text" name="tlf">
        <br>
        Introduce tu email: 
        <br>
        <input type="mail" name="mail">
        <br>
        <input type="submit" name="Enviar">
    </form>
    <?php
        
        $nombre = $_POST["name"];
        $tlf = $_POST["tlf"];
        $mail = $_POST["mail"];
        
        echo "¡Buenos dias, " . $nombre . "! <br>";
        echo "Te voy a enviar spam a " . $mail . " y te llamaré de madrugada a ". $tlf .  ". <br>";
        echo "Enviado desde un iPhone";
    ?>
</body>
</html>