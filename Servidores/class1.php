<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        class coche{
            private $color ="Rojo";
            private $marca ="Ferrari";
            private $modelo = "Aventator";
            private $velocidad = 300;
            private $caballos = 500;
            private $plazas = 2;
        }

        function sumarVelocidad($velocidad){
            $velocidad += $velocidad;
        }

        function restarVelocidad($velocidad){
            $velocidad -= $velocidad;
        }
    ?>
</body>
</html>