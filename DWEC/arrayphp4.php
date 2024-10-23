<?php
$valores = array();
$cuadrados = array();
$cubos = array();

for ($i = 0; $i < 20; $i++) {
    $valor = rand(0, 100); 
    $valores[] = $valor; 
    $cuadrados[] = $valor ** 2;
    $cubos[] = $valor ** 3;
}

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Valor</th><th>Cuadrado</th><th>Cubo</th></tr>";

for ($i = 0; $i < 20; $i++) {
    echo "<tr>";
    echo "<td>" . $valores[$i] . "</td>";
    echo "<td>" . $cuadrados[$i] . "</td>";
    echo "<td>" . $cubos[$i] . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
