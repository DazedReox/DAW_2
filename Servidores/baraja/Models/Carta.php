<?php
namespace Models;

class Carta {
    private string $palo;
    private string $valor;

    public function __construct(string $palo, string $valor) {
        $this->palo = $palo;
        $this->valor = $valor;
    }

    public function getPalo(): string {
        return $this->palo;
    }

    public function getValor(): string {
        return $this->valor;
    }
}
?>