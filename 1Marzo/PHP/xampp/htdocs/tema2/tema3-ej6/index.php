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
    <title>Calcular mcd</title>
</head>
<body>
    <h2>Calculadora de mcd</h2>
    <form method="post">
        Numero 1: <input type="number" name="num1" required><br><br>
        Numero 2: <input type="number" name="num2" required><br><br>
        <input type="submit" value="Calcular mcd">
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
