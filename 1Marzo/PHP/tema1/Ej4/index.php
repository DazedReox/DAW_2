<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $euros = 50;
        $tasa = 1.10;

        $dolares = $euros * $tasa;

        echo "Conversion de euros a dolares:\n";

        echo "\nUsando echo:\n";
        echo $euros . " euros equivalen a " . $dolares . " dolares.\n";

        print("\nUsando print:\n");
        print($euros . " euros equivalen a " . $dolares . " dolares.\n");

        printf("\nUsando printf:\n");
        printf("%.2f euros equivalen a %.2f dlares.\n", $euros, $dolares);
    ?>
</body>
</html>