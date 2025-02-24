<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class CancionModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    //obtiene
    public function getByTitulo($listaNombre, $titulo)
    {
        $stmt = $this->db->prepare("SELECT * FROM canciones WHERE lista_nombre = :listaNombre AND titulo = :titulo");
        $stmt->execute([
            'listaNombre' => $listaNombre,
            'titulo' => $titulo
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //agrega
    public function add($listaNombre, $titulo, $artista)
    {
        $stmt = $this->db->prepare("INSERT INTO canciones (lista_nombre, titulo, artista) VALUES (:listaNombre, :titulo, :artista)");
        return $stmt->execute([
            'listaNombre' => $listaNombre,
            'titulo' => $titulo,
            'artista' => $artista
        ]);
    }

    //elimina
    public function delete($listaNombre, $titulo)
    {
        $stmt = $this->db->prepare("DELETE FROM canciones WHERE lista_nombre = :listaNombre AND titulo = :titulo");
        return $stmt->execute([
            'listaNombre' => $listaNombre,
            'titulo' => $titulo
        ]);
    }
}
?>