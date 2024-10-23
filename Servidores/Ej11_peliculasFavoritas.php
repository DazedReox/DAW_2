<?php
/*Guarda en un array tus 10 películas favoritas.
Imprime en párrafos con el siguiente formato que incluye la posición de la película: ‘Película 4: Los Vengadores’
Vuelve a mostrar las películas pero en lugar de párrafos usa una tabla.
Añade un poco de CSS para mejorar el diseño. Cada título debe tener un color aleatorio.
*/
$peliculas = [
    "Los vengadores",
    "Iron Man",
    "El increible Hulk",
    "Iron Man 2",
    "Thor",
    "Capitán América: El primer vengador",
    "Iron Man 3",
    "Thor: El mundo oscuro",
    "Capitán América: El soldado de invierno",
    "Guardiantes de la galaxia"];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Peliculas favoritas</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            table-layout: auto;
            margin-left: auto;
            margin-right: auto;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h3> Mostramos peliculas en párrafos distintos:</h3>
<?php
    foreach ($peliculas as $indice => $pelicula) {
        echo "<p> <b>Pelicula " . $indice +1 .": </b>" . $pelicula ."</p>";
    }
?>
    <hr/>
    <h3> Mostramos peliculas usando una tabla:</h3>
    <table>
        <tr>
            <th>Pelicula</th>
            <th>Título</th>
        </tr>
<?php
    foreach ($peliculas as $indice => $pelicula) {
        //echo "<tr><td>" . $indice . "</td><td>" . $pelicula ."</td></tr>";
        $color = '#' . dechex(rand(0x000000, 0xFFFFFF)); // Genera un color aleatorio
        ?>
        <tr>
            <td> <?=($indice + 1)?></td>
            <td style='color: <?= $color ?>'><?= $pelicula ?></td>
        </tr>
<?php
    }
?>
    </table>
</body>
</html>
