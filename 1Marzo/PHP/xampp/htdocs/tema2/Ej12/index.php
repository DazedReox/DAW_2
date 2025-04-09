<?php
// Valores recibidos por parámetro o valores por defecto
$filas = isset($_GET['filas']) ? intval($_GET['filas']) : 5;
$columnas = isset($_GET['columnas']) ? intval($_GET['columnas']) : 5;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla con diagonales</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        td {
            border: 1px solid #444;
            padding: 10px;
            width: 60px;
            height: 40px;
            text-align: center;
        }
        caption {
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Tabla de coordenadas con diagonales (<?= $filas ?> x <?= $columnas ?>)</h2>

<table>
    <caption>Solo diagonales</caption>
    <tbody>
        <?php
        for ($i = 1; $i <= $filas; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $columnas; $j++) {
                // Mostrar solo si es diagonal principal o secundaria
                if ($i == $j || ($i + $j == $columnas + 1)) {
                    echo "<td>($i, $j)</td>";
                } else {
                    echo "<td>&nbsp;</td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
