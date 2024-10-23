<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora</title>
    </head>
    <body>
        <h1>Calculadora</h1>
        <form action="calc.php" method="post">
            <input type="text" name="num1" placeholder="Numero 1">
            <input type="text" name="num2" placeholder="Numero 2">
            <button type="submit" name="operation" value="sumar">Sumar</button>
            <button type="submit" name="operation" value="restar">Restar</button>
            <button type="submit" name="operation" value="multiplicar">Multiplicar</button>
            <button type="submit" name="operation" value="dividir">Dividir</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errores = [];
                if (isset($_POST['num1']))
                    $num1 = filter_var($num1, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                if (isset($_POST['num2']))
                    $num1 = filter_var($num2, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

                $operation = $_POST['operation'];
                $result = '';

                if ($operation == "sumar") {
                    $result = $num1 + $num2;
                    echo "El resultado de la suma es: $result";
                } elseif ($operation == "restar") {
                    $result = $num1 - $num2;
                    echo "El resultado de la resta es: $result";
                }elseif ($operation == "multiplicar") {
                    $result = $num1 * $num2;
                    echo "El resultado de la multiplicacion es: $result";
                }elseif ($operation == "dividir") {
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                        echo "El resultado de la division es : $result";
                    } else {
                        echo "Error: No se puede dividir entre cero.";
                    }
                }
            }
        ?>
    </body>
</html>