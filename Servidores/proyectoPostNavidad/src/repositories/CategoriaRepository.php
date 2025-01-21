<?php
namespace Repositories;

use Lib\Database;
use Models\Categoria;
use PDO;

class CategoriaRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function save(Categoria $categoria) {
        $sql = "INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nombre' => $categoria->getNombre(),
            ':descripcion' => $categoria->getDescripcion()
        ]);
        
        return $this->db->lastInsertId();
    }

    public function findAll() {
        $sql = "SELECT * FROM categorias ORDER BY nombre";
        $stmt = $this->db->query($sql);
        
        $categorias = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categorias[] = new Categoria($row);
        }
        
        return $categorias;
    }

    public function find($id) {
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Categoria($row);
        }
        
        return null;
    }
}
?>