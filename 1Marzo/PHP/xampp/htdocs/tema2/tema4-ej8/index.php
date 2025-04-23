<?php

$profesores = [
    [
        "registro" => "P001",
        "nombre" => "Ana",
        "apellidos" => "García López",
        "telefono" => "612345678",
        "nacimiento" => "1985-04-12"
    ],
    [
        "registro" => "P002",
        "nombre" => "Luis",
        "apellidos" => "Martínez Ruiz",
        "telefono" => "622334455",
        "nacimiento" => "1992-11-03"
    ],
    [
        "registro" => "P003",
        "nombre" => "Marta",
        "apellidos" => "Sánchez Pérez",
        "telefono" => "633112233",
        "nacimiento" => "1990-06-22"
    ]
];
?>

<?php 
    function mostrarRegistros($profesores) {
        foreach ($profesores as $profesor) {
            echo "Registro: " . $profesor["registro"] . "<br>";
        }
    }
    
    mostrarRegistros($profesores);
    
?>

<?php 
    $registros = array_map(function($profesor) {
        return $profesor["registro"];
    }, $profesores);
    
    echo "<h3>Numeros de registro:</h3>";
    foreach ($registros as $registro) {
        echo "Registro: $registro<br>";
    }  
?>

<?php 
    $profesores1990 = array_filter($profesores, function($profesor) {
        return strtotime($profesor["nacimiento"]) >= strtotime("1990-01-01");
    });
    
    echo "<h3>Profesores nacidos a partir de 1990:</h3>";
    foreach ($profesores1990 as $p) {
        echo $p["nombre"] . " " . $p["apellidos"] . " - Nacido el " . $p["nacimiento"] . "<br>";
    }    
?>