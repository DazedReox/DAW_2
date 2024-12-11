<?php

namespace App\Models;

use PDO;

class Usuario extends BaseModel
{
    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO usuarios (nombre, username, password, rol) VALUES (?, ?, ?, ?)");
        $stmt->execute([$data['nombre'], $data['username'], password_hash($data['password'], PASSWORD_BCRYPT), $data['rol']]);
    }
}
?>
