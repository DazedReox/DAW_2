<?php

namespace App\Models;

use PDO;

class Producto extends BaseModel
{
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM productos ORDER BY nombre ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO productos (nombre, cantidad, precio) VALUES (?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['cantidad'], $data['precio']]);
    }

    public function updateStock($id, $cantidad)
    {
        $stmt = $this->db->prepare("UPDATE productos SET cantidad = ? WHERE id = ?");
        $stmt->execute([$cantidad, $id]);
    }
}
?>
