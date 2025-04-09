<?php
// Número recibido por parámetro (por ejemplo, vía GET)
$numero = isset($_GET['numero']) ? intval($_GET['numero']) : 5;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de multiplicar del <?= $numero ?></title>
    <style>
        table {
            border-collapse: collapse;
            width: 300px;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }
        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Tabla de multiplicar del número <?= $numero ?></h2>

<table>
    <thead>
        <tr>
            <th>Multiplicación</th>
            <th>Resultado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 1; $i <= 10; $i++) {
            $resultado = $numero * $i;
            echo "<tr><td>$numero x $i</td><td>$resultado</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
