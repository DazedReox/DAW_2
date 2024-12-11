<?php

namespace App\Models;

class Compra extends BaseModel
{
    public function register($data)
    {
        $stmt = $this->db->prepare("INSERT INTO compras (cliente_id, producto_id, cantidad, total) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['cliente_id'], $data['producto_id'], $data['cantidad'], $data['total']]);
    }
}
?>
