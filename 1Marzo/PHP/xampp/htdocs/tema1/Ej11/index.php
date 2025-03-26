<?php 
    $numero = range(1, 40);
    $i = 0;

    while($i < count($numeros)){
        echo "Elemento " . ($i +1) . ": " . ($numeros[$i] ** 2) . "<br>";
        $i++;
    }
?>

<?php 
    $i = 1;
    while($i <= 40){
        echo "el cuadrado de " . $i . "es: " . $i ** 2 . "<br>";
    }
?>