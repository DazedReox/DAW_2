<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $hoy = date("Y-m-d");

        $ayer = date("Y-m-d", strtotime("-1 day"));

        $manana = date("Y-m-d", strtotime("+1 day"));

        echo "Fecha de hoy: " . $hoy . "\n";
        echo "Fecha de ayer: " . $ayer . "\n";
        echo "Fecha de mañana: " . $manana . "\n";
    ?>
</body>
</html>