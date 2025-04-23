<?php
function mcd($a, $b) {
    while ($b != 0) {
        $x = $b;
        $b = $a % $b;
        $a = $x;
    }
    return $a;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Calcular MCD</title>
</head>
<body>
    <h2>Calculadora de MCD (Máximo Común Divisor)</h2>
    <form method="post">
        Número 1: <input type="number" name="num1" required><br><br>
        Número 2: <input type="number" name="num2" required><br><br>
        <input type="submit" value="Calcular MCD">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = intval($_POST["num1"]);
        $num2 = intval($_POST["num2"]);
        $resultado = mcd($num1, $num2);
        echo "<h3>El MCD de $num1 y $num2 es $resultado</h3>";
    }
    ?>
</body>
</html>
