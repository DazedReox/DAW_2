<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $altura = 5;

        for ($i = 1; $i <= $altura; $i++) {
            echo str_repeat(" ", $altura - $i);
            
            if ($i == 1) {
                echo "*";
            } elseif ($i == $altura) {
                echo str_repeat("*", 2 * $i - 1);
            } else {
                echo "*".str_repeat(" ", (2 * $i - 3))."*";
            }
            echo "\n";
        }
    ?>
</body>
</html>