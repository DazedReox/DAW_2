<?php
/*  Supongamos que guardamos en una array los datos de los profesores de este centro educativo.
    Cada elemento de este array a su vez será otro array asociativo que nos permitirá almacenar su número
    de registro personal, su nombre, su apellido/s, su teléfono, y su fecha de nacimiento.
    Se desea:
    a) Crear un array con al menos los datos de 3 profesores
    b) Crear una función que nos permita mostrar el número de registro personal de cada uno de los profesores
    c) Modifica la función anterior y conviértela en una función anónima (usa array_map()).
    d) Crea una función anónima que nos permita mostrar los profesores que han nacido a partir de 1990.
     Usa strtotime() y array_filter()
    NOTA: Ejemplo de uso de funciones anónimas , arrays , array_map() y array_filter().
 */
$datosProfesores = array(
    array("numRegistro"=>5843,
        "nombre" =>"Pedro",
        "apellido1" =>"Martinez",
        "apellido2" =>"Perez",
        "telefono"=>"623232323",
        "fechaNacimiento"=>"1980-08-05"),
    array("numRegistro"=>5844,
        "nombre" =>"Manuel",
        "apellido1" =>"Ortiz",
        "apellido2" =>"González",
        "telefono"=>"625252525",
        "fechaNacimiento"=>"1985-05-06"),
    array("numRegistro"=>5845,
        "nombre" =>"Sandra",
        "apellido1" =>"Ruiz",
        "apellido2" =>"López",
        "telefono"=>"626636465",
        "fechaNacimiento"=>"1995-01-01")
);
/** mostrar el número de registro personal de cada uno de los profesores
 * @return void
 */
function muestraNumerosRegistroProfesores(){
    global $datosProfesores;

    foreach ($datosProfesores as $profesor){
        echo $profesor["numRegistro"]."<br>";
    }
}
//muestraNumerosRegistroProfesores();
// ======================================================================================
// modificar funcion y convertirla en funcion anónima usando array_map
$mostrarNumeroRegistroAnonima = function($profesor) {
    return $profesor["numRegistro"];
};
$numerosRegistro= array_map($mostrarNumeroRegistroAnonima, $datosProfesores);
//print_r($numerosRegistro);
//======================================================================================
//d) Crea una función anónima que nos permita mostrar los profesores que han nacido a partir de 1990.
//     Usa strtotime() y array_filter()
$profesoresNDespues1990 = array_filter($datosProfesores, function($profesor){
    return strtotime($profesor["fechaNacimiento"]) >= strtotime("1990-01-01"); } );
print_r($profesoresNDespues1990);
?>