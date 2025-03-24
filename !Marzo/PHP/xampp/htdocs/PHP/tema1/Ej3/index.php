<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a = 1;
        $b = -3;
        $c = 2;

        $discriminante = pow($b, 2) - 4 * $a * $c;

        echo "Ecuacion: {$a}x^2 + {$b}x + {$c} = 0\n";

        if ($discriminante < 0) {
            echo "No hay soluciones reales\n";
        } else {
            $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
            $x2 = (-$b - sqrt($discriminante)) / (2 * $a);

            echo "<br>";
            echo "Con echo: ";
            echo "<br>";
            echo "Sol 1: " . $x1;
            echo "<br>";
            echo "Sol 2: " . $x2;
            echo "<br>";

            echo "<br>";
            print("Con print: ");
            echo "<br>";
            print("Sol 1: " . $x1);
            echo "<br>";
            print("Sol 2: " . $x2);
            echo "<br>";

            echo "<br>";
            printf("Con printf: ");
            printf("Sol 1: %.2f\n", $x1);
            printf("Sol 2: %.2f\n", $x2);
        }
    ?>
</body>
</html>