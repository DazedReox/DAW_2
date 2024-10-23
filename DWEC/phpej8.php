<?php
// a) Crear un array con al menos los datos de 3 profesores
$profesores = [
    [
        'numero_registro' => 'P001',
        'nombre' => 'Juan',
        'apellidos' => 'Pérez Gómez',
        'telefono' => '123456789',
        'fecha_nacimiento' => '1980-01-15'
    ],
    [
        'numero_registro' => 'P002',
        'nombre' => 'María',
        'apellidos' => 'López Martínez',
        'telefono' => '987654321',
        'fecha_nacimiento' => '1985-06-25'
    ],
    [
        'numero_registro' => 'P003',
        'nombre' => 'Carlos',
        'apellidos' => 'Fernández Sánchez',
        'telefono' => '555555555',
        'fecha_nacimiento' => '1990-03-10'
    ]
];
// b) Crear una función que nos permita mostrar el número de registro personal de cada uno de los profesores
function mostrarNumeroRegistro($profesores) {
    foreach ($profesores as $profesor) {
        echo $profesor['numero_registro'] . PHP_EOL;
    }
}
mostrarNumeroRegistro($profesores);

// c) Modifica la función anterior y conviértela en una función anónima (usa array_map())
$numeroRegistros = array_map(function($profesor) {
    return $profesor['numero_registro'];
}, $profesores);

foreach ($numeroRegistros as $numero) {
    echo $numero . PHP_EOL;
}
?>
