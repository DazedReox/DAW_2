<?php
/*scribe un programa que guarde en un array los nombres de las provincias de Andalucia.
 Usa la función unset() para borrar el elemento que desees de ese array. Deberás pasarle a la función como parámetro
 el índice del elemento a borrar.
Por ejemplo, puedes borrar la de índice 2.
Nota: Si no pones el índice en la función unset() se borrarán todos los elementos del array
*/
$provinciasAnd=["Almería", "Cadiz", "Cordoba", "Granada", "Huelva", "Jaen", "Malaga", "Sevilla"];

function borrarProvincia($provincia){
    global $provinciasAnd;

    if (isset($provincia))
        unset($provinciasAnd[$provincia]);
    else
        unset($provinciasAnd);
}
print_r($provinciasAnd);
echo "borramos provincia 2<br>";
borrarProvincia(2);
print_r($provinciasAnd);
echo "borramos provincia 3<br>";
borrarProvincia(3);

print_r($provinciasAnd);
echo "borramos todo<br>";
borrarProvincia(null); //no lo borra, ver documentacion de unset
print_r($provinciasAnd);
