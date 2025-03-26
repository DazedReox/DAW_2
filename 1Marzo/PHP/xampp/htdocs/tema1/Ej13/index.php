<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        echo "<table border='1' cellspacing='0' cellpadding='5'>";
        
        for ($i = 0; $i <= 10; $i++){
            echo "<tr>";
            for($j = 0; $j <= 10; $j++){
                $resultado = $i * $j;
                echo "<td> $j x $i </td><td>". $resultado . "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    ?>
</body>
</html>