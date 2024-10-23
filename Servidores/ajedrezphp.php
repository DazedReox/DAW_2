<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ajedrez</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            width: 60px;
            height: 60px;
            text-align: center;
            vertical-align: middle;
        }
        .blanco {
            background-color: white;
        }
        .gris {
            background-color: gray;
        }
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
<?php
// Función para dibujar el tablero
function dibujarTablero($piezasBlancas, $piezasNegras, $rutaImagenes) {
    echo "<table border='1'>";
    
    // Dibujar las filas del tablero
    for ($fila = 8; $fila >= 1; $fila--) {
        echo "<tr>";
        for ($columna = 1; $columna <= 8; $columna++) {
            // Determinar el color de la casilla
            $color = (($fila + $columna) % 2 == 0) ? "gris" : "blanco";
            echo "<td class='$color'>";
            // Colocar las piezas negras y blancas
            if ($fila == 8) {
                echo "<img src='$rutaImagenes/{$piezasNegras[$columna - 1]}.png' alt='pieza'>";
            } elseif ($fila == 7) {
                echo "<img src='$rutaImagenes/peonn.png' alt='peón negro'>";
            } elseif ($fila == 2) {
                echo "<img src='$rutaImagenes/peonb.png' alt='peón blanco'>";
            } elseif ($fila == 1) {
                echo "<img src='$rutaImagenes/{$piezasBlancas[$columna - 1]}.png' alt='pieza'>";
            }
            echo "</td>";
        }
        echo "</tr>";
    }    
    echo "</table>";
}
// Arrays de las piezas blancas y negras
$piezasBlancas = array("torreb", "caballob", "alfilb", "reinab", "reyb", "alfilb", "caballob", "torreb");
$piezasNegras = array("torren", "caballon", "alfiln", "reinan", "reyn", "alfiln", "caballon", "torren");
$rutaImagenes = "./Servidores";

dibujarTablero($piezasBlancas, $piezasNegras, $rutaImagenes);
?>

</body>
</html>
