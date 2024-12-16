<?php
namespace App\Models;
use PDO;
class Pedido extends BaseModel
{
    public function getAll()
    {
        $stmt = $this->db->prepare("
            SELECT p.id, p.cliente_email, p.producto_id, p.estado, p.created_at, prod.nombre AS producto_nombre
            FROM pedidos p
            JOIN productos prod ON p.producto_id = prod.id
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("
            SELECT p.id, p.cliente_email, p.producto_id, p.estado, p.created_at, prod.nombre AS producto_nombre
            FROM pedidos p
            JOIN productos prod ON p.producto_id = prod.id
            WHERE p.id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("
            INSERT INTO pedidos (cliente_email, producto_id, estado)
            VALUES (:cliente_email, :producto_id, :estado)
        ");
        $stmt->bindParam(':cliente_email', $data['cliente_email'], PDO::PARAM_STR);
        $stmt->bindParam(':producto_id', $data['producto_id'], PDO::PARAM_INT);
        $stmt->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $stmt->execute();
    }

    public function markAsNotified($id)
    {
        $stmt = $this->db->prepare("
            UPDATE pedidos
            SET estado = 'notificado'
            WHERE id = :id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
