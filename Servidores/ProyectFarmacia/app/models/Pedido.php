<?php

namespace App\Models;

class Pedido extends BaseModel
{
    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO pedidos (cliente_email, producto_id, estado) VALUES (?, ?, ?)");
        $stmt->execute([$data['cliente_email'], $data['producto_id'], 'pendiente']);
    }

    public function notify($pedidoId)
    {
        $stmt = $this->db->prepare("UPDATE pedidos SET estado = 'notificado' WHERE id = ?");
        $stmt->execute([$pedidoId]);
    }
}
?>
