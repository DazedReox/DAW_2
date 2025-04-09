<?php
// Hora inicial (puedes modificar estos valores para probar)
$hora = 23;
$minuto = 59;
$segundo = 59;
$segundo++;

if ($segundo == 60) {
    $segundo = 0;
    $minuto++;
}

if ($minuto == 60) {
    $minuto = 0;
    $hora++;
}

if ($hora == 24) {
    $hora = 0;
}

echo "La hora dentro de un segundo es: $hora:$minuto:$segundo";
?>
