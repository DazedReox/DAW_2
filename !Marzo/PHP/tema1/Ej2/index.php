<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $radio = 5;

        $longitud = 2 * pi() * $radio;
        $superficie = 4 * pi() * pow($radio, 2);
        $volumen = (4/3) * pi() * pow($radio, 3);

        echo "Con round round: ";
        echo "<br>";
        echo "Longitud: " . round($longitud, 2);
        echo "<br>";
        echo "Superficie: " . round($superficie, 2);
        echo "<br>";    
        echo "Volumen: " . round($volumen, 2);
        echo "<br>";

        echo "Con printf: ";
        echo "<br>";
        printf("Longitud: %.2f", $longitud);
        echo "<br>";
        printf("Superficie: %.2f", $superficie);
        echo "<br>";
        printf("Volumen: %.2f", $volumen);
    ?>

</body>
</html>