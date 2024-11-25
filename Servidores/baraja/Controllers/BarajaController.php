<?php
namespace Controllers;

use Models\Baraja;

class BarajaController {
    private Baraja $baraja;

    public function __construct() {
        $this->baraja = new Baraja();
    }

    public function mostrarBaraja(): void {
        $cartas = $this->baraja->mostrarBaraja();
        require_once './Views/baraja/mostrarBaraja.php';
    }

    public function mostrarCarta(): void {
        $carta = $this->baraja->sacarCarta();
        require_once './Views/baraja/mostrarCarta.php';
    }

    public function barajar(): void {
        $this->baraja->barajar();
        $cartas = $this->baraja->mostrarBaraja();
        require_once './Views/baraja/barajar.php';
    }

    public function repartir(int $jugadores, int $cartasPorJugador): void {
        $reparto = $this->baraja->repartir($jugadores, $cartasPorJugador);
        require_once './Views/baraja/repartir.php';
    }
}
