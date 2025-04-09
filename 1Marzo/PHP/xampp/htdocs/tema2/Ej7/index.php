<?php
$a = 1;
$b = -3;
$c = 2;
$discriminante = ($b * $b) - (4 * $a * $c);

echo "Ecuación: {$a}x² + ({$b})x + ({$c}) = 0\n";

if ($a == 0) {
    echo "No es una ecuación de segundo grado.";
} else {
    if ($discriminante > 0) {
        $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
        echo "Tiene dos soluciones reales: x1 = $x1 y x2 = $x2";
    } elseif ($discriminante == 0) {
        $x = -$b / (2 * $a);
        echo "Tiene una solución real doble: x = $x";
    } else {
        echo "No tiene soluciones reales (raíces imaginarias)";
    }
}
?>