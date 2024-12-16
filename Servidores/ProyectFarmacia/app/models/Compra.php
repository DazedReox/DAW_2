<?php
namespace App\Models;
use PDO;
class Compra extends BaseModel
{
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM compras");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM compras WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function register($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO compras (cliente_id, producto_id, cantidad, total, estado)
            VALUES (:cliente_id, :producto_id, :cantidad, :total, 'pendiente')
        ");
        $stmt->bindParam(':cliente_id', $data['cliente_id'], PDO::PARAM_INT);
        $stmt->bindParam(':producto_id', $data['producto_id'], PDO::PARAM_INT);
        $stmt->bindParam(':cantidad', $data['cantidad'], PDO::PARAM_INT);
        $stmt->bindParam(':total', $data['total'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function markAsPaid($id)
    {
        $stmt = $this->db->prepare("UPDATE compras SET estado = 'pagado' WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
