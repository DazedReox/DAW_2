<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "Numeros pares del 1 al 100:\n";

        for ($i = 2; $i <= 100; $i += 2) {
            echo $i . " ";
        }
    ?>
</body>
</html>