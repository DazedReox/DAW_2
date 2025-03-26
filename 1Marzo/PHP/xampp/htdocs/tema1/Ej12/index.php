<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $n1 = rand(1, 6);
        $n2 = rand(1, 6);

        if($n1 = $n2){
            echo "Los valores de los dados son iguales: " . $n1 . ", " . $n2;
        }else{
            echo "Los valores de los dados no son iguales: " . $n1 . ", " . $n2;
        }
        if($n1-$n2 > 0){
           echo "El valor mayor es el de la primera tirada: " . $n1 . "."; 
        }elseif($n1-$n2 < 0){
            echo "El valor mayor es el de la segunda tirada: " . $n2 . ".";
        }else{
            echo "Los valores son iguales.";
        }
    ?>
</body>
</html>