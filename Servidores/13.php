<?php

// a) Definimos la baraja española
$palos = ['oros', 'copas', 'espadas', 'bastos'];
$cartas = [];

// Generamos las cartas de la baraja
foreach ($palos as $palo) {
    $cartas[] = "As de $palo";
    $cartas[] = "2 de $palo";
    $cartas[] = "3 de $palo";
    $cartas[] = "4 de $palo";
    $cartas[] = "5 de $palo";
    $cartas[] = "6 de $palo";
    $cartas[] = "7 de $palo";
    $cartas[] = "Sota de $palo";
    $cartas[] = "Caballo de $palo";
    $cartas[] = "Rey de $palo";
}

// a) Repartir tres cartas al jugador
$cartasJugador = [];
while (count($cartasJugador) < 3) {
    $indice = rand(0, count($cartas) - 1);
    $carta = $cartas[$indice];
    if (!in_array($carta, $cartasJugador)) {
        $cartasJugador[] = $carta;
    }
}

// Mostrar cartas del jugador
echo "Cartas repartidas al jugador: " . implode(", ", $cartasJugador) . "\n";

// b) Crear un array asociativo para los puntos
$puntosCartas = [
    'As' => 11,
    '3' => 10,
    'Rey' => 4,
    'Caballo' => 3,
    'Sota' => 2,
    '2' => 0,
    '4' => 0,
    '5' => 0,
    '6' => 0,
    '7' => 0
];

// Generar la baza del jugador
$bazaJugador = [];
while (count($bazaJugador) < 10) {
    $indice = rand(0, count($cartas) - 1);
    $carta = $cartas[$indice];
    if (!in_array($carta, $bazaJugador) && !in_array($carta, $cartasJugador)) {
        $bazaJugador[] = $carta;
    }
}

// Mostrar cartas de la baza del jugador
echo "Cartas en la baza del jugador: " . implode(", ", $bazaJugador) . "\n";

// Calcular los puntos de la baza
$totalPuntos = 0;

foreach ($bazaJugador as $carta) {
    // Extraer el nombre de la figura
    $partes = explode(" ", $carta);
    $nombreCarta = $partes[0];
    if (isset($puntosCartas[$nombreCarta])) {
        $totalPuntos += $puntosCartas[$nombreCarta];
    }
}

// Mostrar el total de puntos
echo "Total de puntos en la baza del jugador: $totalPuntos\n";

?>
