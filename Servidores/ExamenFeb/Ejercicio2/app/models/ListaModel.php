<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class ListaModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    //all
    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM listas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //obtiene
    public function getByName($nombre)
    {
        $stmt = $this->db->prepare("SELECT * FROM listas WHERE nombre = :nombre");
        $stmt->execute(['nombre' => $nombre]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //crea
    public function create($nombre)
    {
        $stmt = $this->db->prepare("INSERT INTO listas (nombre) VALUES (:nombre)");
        return $stmt->execute(['nombre' => $nombre]);
    }

    //borra 
    public function delete($nombre)
    {
        $stmt = $this->db->prepare("DELETE FROM listas WHERE nombre = :nombre");
        return $stmt->execute(['nombre' => $nombre]);
    }
}
?>