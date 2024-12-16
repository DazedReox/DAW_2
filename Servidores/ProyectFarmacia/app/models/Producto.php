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

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO productos (nombre, cantidad, precio)
            VALUES (:nombre, :cantidad, :precio)
        ");
        $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);
        $stmt->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("
            UPDATE productos
            SET nombre = :nombre, cantidad = :cantidad, precio = :precio
            WHERE id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);
        $stmt->bindParam(':precio', $data['precio'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM productos WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    public function updateStock($id, $cantidad)
    {
        $stmt = $this->db->prepare("
            UPDATE productos
            SET cantidad = :cantidad
            WHERE id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
