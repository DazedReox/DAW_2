<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7</title>
    <link href="minimal-table.css" rel="stylesheet" type="text/css">
</head>
<body>
<table>
    <tr>
        <th>Variable</th>
        <th>Valor</th>
    </tr>
<?php
/** Usar foreach para mostrar todos los valores del array $_SERVER en una tabla con dos columnas.
* La primera columna debe contener el nombre de la variable, y la segunda su valor
*/
    foreach($_SERVER as $key => $value){
        //echo $key.": ".$value."<br>";
        echo "<tr><td>".$key. "</td>". "<td>".$value."</td>". "</tr>";
    }
 ?>
</table>
</body>
</html>