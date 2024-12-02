<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        
        fopen("hola.txt", "r");
        fclose("hola.txt");

        $fich = fopen("hola.txt", "r");
        if ($fich === False){
            echo "No se encuentra hola.txt";
        }else{
            echo "hola.txt esta abierto";
        }
        fclose($fich);
        
        $fich = fopen("hola2.txt", "r");
        if ($fich === False){
            echo "No se encuentra hola2.txt<br>";
        }else{
            echo " hola2.txt se abrió con éxito<br>";
        } 
        fclose($fich);

        ?>
    </body>
</html>