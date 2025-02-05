<?php
    /*Escribe un script que almacene un array de 8 números enteros:
    a. recorrerá el array y lo mostrará
    b. lo ordenará y lo mostrará
    c. mostrará su longitud
    d. buscará un elemento dentro del array
    e. buscará un elemento dentro del array, pero por el parámetro que llegue a la URL
    Para mostrar los elementos del array en cada uno de los apartados se creará una función llamada mostrarArray().
    */
    //$array_ejercicio = array(1,2,3,4,5,6,7,25);
$array_ejercicio = array(3,4,2,6,7,25,1,5);
    /** función dado un array devuelve un cadena con el listado de elementos
     * @param $array
     * @return string cadena con listado elementos separados por ","
     */
    function recorreArrayYMuestra($array) {
        //$salida = implode(",", $array);
        $salida ="";
        foreach ($array as $elemento) {
            if (!empty($salida)){
                $salida .= "," . $elemento;
            }
            else
                $salida .= $elemento;
        }
        echo "Listado de elementos del array tras recorrerlo:" . $salida;
    }

    /** funcion ordena array pasado como parametro y lo muestra mediante llamada a recorreArrayYMuestra
     * @param $array
     * @return void
     */
    function ordenaYMuestra($array)
    {
        sort($array);
        recorreArrayYMuestra($array);
    }

    /** funcion muestra por pantalla número elementos array pasado como parámetro
     * @param $array
     * @return void
     */
    function muestraLongitud($array)
    {
        echo "Número elementos array: " . count($array);
    }

    /** funcion busca el elemento indicado por $valorBuscar en el array y retorna un booleano indicando si el valo se
     * encontro o no
     * @param $array
     * @param int $valorBuscar
     * @return bool|null
     */
    function buscaElementoEnArray($array, int $valorBuscar): ?bool
    {
        return in_array($valorBuscar, $array);
    }
//============================================================================================
    // Ejemplo de uso:
    if (isset($_GET['opc']) && isset($_GET['opc'])) {
        $opc = intval($_GET['opc']);
        if($opc == 5){// opcion buscar elemento en array
            if (isset($_GET['cadb']) && isset($_GET['cadb'])) {
                $cadb = $_GET['cadb'];
            }
            else{
                echo "Has de indicar una cadena de busqueda para la opción 5.";
                exit(1);
            }
        }

    } else {
        echo "Por favor, pase una opción.";
        exit(1);
    }
    switch ($opc) {
        case 1: recorreArrayYMuestra($array_ejercicio);break;
        case 2: ordenaYMuestra($array_ejercicio);break;
        case 3: muestraLongitud($array_ejercicio);break;
        case 4:
                $valorBuscar = 53;
                if (buscaElementoEnArray($array_ejercicio, $valorBuscar)){
                    echo "El valor " . $valorBuscar . " se encuentra el array.";
                }
                else
                    echo "El valor " . $valorBuscar . " NO se encuentra el array.";

                break;

        default: break;
    };
?>