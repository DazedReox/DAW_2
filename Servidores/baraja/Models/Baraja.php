<?php
namespace Models;

class Baraja {
    private array $cartas;

    public function __construct() {
        $this->cartas = $this->crearBaraja();
    }

    private function crearBaraja(): array {
        $palos = ['Oros', 'Copas', 'Espadas', 'Bastos'];
        $valores = ['1', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'];

        $baraja = [];
        foreach ($palos as $palo) {
            foreach ($valores as $valor) {
                $baraja[] = new Carta($palo, $valor);
            }
        }

        return $baraja;
    }

    public function barajar(): void {
        shuffle($this->cartas);
    }

    public function mostrarBaraja(): array {
        return $this->cartas;
    }

    public function sacarCarta(): ?Carta {
        return array_pop($this->cartas);
    }

    public function repartir(int $jugadores, int $cartasPorJugador): array {
        $reparto = [];
        for ($i = 0; $i < $jugadores; $i++) {
            $reparto[$i] = [];
            for ($j = 0; $j < $cartasPorJugador; $j++) {
                if (count($this->cartas) > 0) {
                    $reparto[$i][] = $this->sacarCarta();
                }
            }
        }
        return $reparto;
    }
}
