<?php
$a = 10;
$b = 20;
$c = 15;

if ($a >= $b) {
    if ($a >= $c) {
        echo "El mayor es: $a";
    } else {
        echo "El mayor es: $c";
    }
} else {
    if ($b >= $c) {
        echo "El mayor es: $b";
    } else {
        echo "El mayor es: $c";
    }
}
?>

<?php
//con operadores logicos
$a = 10;
$b = 20;
$c = 15;

echo "<br>";

if ($a >= $b && $a >= $c) {
    echo "El mayor es: $a";
} elseif ($b >= $a && $b >= $c) {
    echo "El mayor es: $b";
} else {
    echo "El mayor es: $c";
}
?>

