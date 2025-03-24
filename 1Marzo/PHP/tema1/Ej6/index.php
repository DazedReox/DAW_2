<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $cadena = "Hola mundo";

        $longitud = mb_strlen($cadena, "UTF-8");

        $cadena_invertida = "";

        for ($i = $longitud - 1; $i >= 0; $i--) {
            $cadena_invertida .= mb_substr($cadena, $i, 1, "UTF-8");
        }

        echo "Cadena original: " . $cadena . "\n";
        echo "Cadena invertida: " . $cadena_invertida . "\n";
    ?>
</body>
</html>