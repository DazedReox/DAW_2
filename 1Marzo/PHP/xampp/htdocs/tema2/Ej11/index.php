<?php
// Número de filas y columnas recibidos por parámetro (GET), o valores por defecto
$filas = isset($_GET['filas']) ? intval($_GET['filas']) : 5;
$columnas = isset($_GET['columnas']) ? intval($_GET['columnas']) : 4;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de <?= $filas ?>x<?= $columnas ?></title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        td, th {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
        }
        caption {
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Tabla de coordenadas <?= $filas ?> x <?= $columnas ?></h2>

<table>
    <caption>Coordenadas de cada celda</caption>
    <tbody>
        <?php
        for ($i = 1; $i <= $filas; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $columnas; $j++) {
                echo "<td>($i, $j)</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
