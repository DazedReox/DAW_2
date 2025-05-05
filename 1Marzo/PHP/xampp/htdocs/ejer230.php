<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <title>Rel 1 - Eje 6</title>
  </head>
  <body>
	
  <h3>Examen - Javier Amador</h3>

<?php

$array = [];
echo "array: ";

for ($i=0; $i < 50; $i++){

  $array [$i] = rand (0, 99);

  if($i == 49){
  echo $array[$i] . ".";
  }else{
  echo $array[$i] . ", ";
  }
}
echo '<br>';


$lista = [];
$posiciones = [];

echo "Posiciones: ";

$posiciones [0] = rand (0, 49);

for ($i=1; $i < 50; $i++){

 $posiciones [$i] = rand (0, 49); 

 for ($j=0; $j < $i; $j++){
   if($posiciones[$j] == $posiciones[$i]){
     $posiciones [$i] = rand (0, 49);
     $j = -1;
    }
  }

  if($i == 49){
  echo $posiciones[$i] . ".";
  }else{
  echo $posiciones[$i] . ", ";
  }

}

$sumPos = 0;
$sum50 = 0; 

for ($i=0; $i < 50; $i++){
  $sumPos = $sumPos + $posiciones[$i];
}
echo '<br>';
echo "sumPos: " . $sumPos;

for ($i=0; $i < 50; $i++){
  $sum50 = $sum50 + $i;
}
echo '<br>';
echo "sum50: " . $sum50;

echo "<br>";
echo "lista: ";
for($i = 0; $i < 50; $i++){
  $lista[$i] = $array[$posiciones[$i]];

  if($i == 49){
  echo $lista[$i] = $array[$posiciones[$i]] . ".";
  }else{
  echo $lista[$i] = $array[$posiciones[$i]] . ", ";
  }
}
$sumaArray = 0;
$sumaLista = 0;

for($i=0 ; $i < 50; $i++){
  $sumaArray = $sumaArray + $array[$i];
}

for($i = 0; $i < 50; $i++){
  $sumaLista = $sumaLista + $lista[$i];
  //non-numeric value 
}
echo "<br>";
echo "sumArray: ";
echo $sumaArray;
echo "<br>";
echo "sumaLista: ";
echo $sumaLista;

?>

</body>

</html>

