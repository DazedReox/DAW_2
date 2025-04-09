<?php
$cantidad = 139;

$denominaciones = [500, 200, 100, 50, 20, 10, 5, 2, 1];
$etiquetas = [
    "billete de 500", "billete de 200", "billete de 100",
    "billete de 50", "billete de 20", "billete de 10",
    "billete de 5", "moneda de 2", "moneda de 1"
];

foreach ($denominaciones as $index => $valor) {
    $cantidad_elementos = intdiv($cantidad, $valor);
    echo ($index + 1) . ". $cantidad_elementos " . $etiquetas[$index] . "\n";
    $cantidad -= $cantidad_elementos * $valor;
}
?>
