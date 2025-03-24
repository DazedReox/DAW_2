<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numeros = [
            1 => ["one", "uno"],
            2 => ["two", "dos"],
            3 => ["three", "tres"],
            4 => ["four", "cuatro"],
            5 => ["five", "cinco"],
            6 => ["six", "seis"],
            7 => ["seven", "siete"],
            8 => ["eight", "ocho"],
            9 => ["nine", "nueve"],
            10 => ["ten", "diez"]
        ];
        echo "<table border='1' cellspacing='0' cellpadding='5'>";
        echo "<tr><th>English</th><th>Español</th></tr>";
        foreach ($numeros as $num => $traduccion) {
            echo "<tr><td>{$traduccion[0]}</td><td>{$traduccion[1]}</td></tr>";
        }

        echo "</table>";
    ?>
</body>
</html>