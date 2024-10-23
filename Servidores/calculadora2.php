<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora en PHP</title>
    <style>
        /* Un poco de estilo básico */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin: 0 auto;
        }
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px;
            margin: 5px;
            width: calc(50% - 12px);
            border: none;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 1.5em;
            text-align: center;
        }
    </style> --!>
</head>
<body>

<div class="container">
    <h2>Calculadora en PHP</h2>
    
    <form method="post">
        <input type="number" name="num1" placeholder="Número 1" required>
        <input type="number" name="num2" placeholder="Número 2" required>

        <div>
            <button type="submit" name="operation" value="sumar">Sumar</button>
            <button type="submit" name="operation" value="restar">Restar</button>
        </div>
        <div>
            <button type="submit" name="operation" value="multiplicar">Multiplicar</button>
            <button type="submit" name="operation" value="dividir">Dividir</button>
        </div>
    </form>

    <div class="result">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los valores de los inputs
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $operation = $_POST['operation'];
            $result = '';

            // Realizar la operación seleccionada
            if ($operation == "sumar") {
                $result = $num1 + $num2;
                echo "El resultado de la suma es: $result";
            } elseif ($operation == "restar") {
                $result = $num1 - $num2;
                echo "El resultado de la resta es: $result";
            } elseif ($operation == "multiplicar") {
                $result = $num1 * $num2;
                echo "El resultado de la multiplicación es: $result";
            } elseif ($operation == "dividir") {
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                    echo "El resultado de la división es: $result";
                } else {
                    echo "Error: No se puede dividir entre cero.";
                }
            }
        }
        ?>
    </div>
</div>

</body>
</html>
