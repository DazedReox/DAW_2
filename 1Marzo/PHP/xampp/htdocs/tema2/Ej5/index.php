<?php
$a = 15;
$b = 42;
$c = 31;

$mayor = $a;

if ($a > $b && $a > $c) {
    $mayor = $a;
}

if ($b > $a && $b > $c) {
    $mayor = $b;
}

if ($c > $a && $c > $b) {
    $mayor = $c;
}

echo "El mayor número es: $mayor";
?>
