<?php
namespace src\Models;
use PDO;
class Usuario extends baseModel {
    public function create($data){
        $stmt = $this->db->prepare("
            INSERT INTO usuarios (nombre, username, password, role)
            VALUES (:nombre, :username, :password, :role)");
        $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
        $stmt->bindParam(':password', $data['password'], PDO::PARAM_STR);
        $stmt->execute();
    }

    //buscar o comprobar si ya existe un usuario en especifico o no
    public function findByUsername($username){
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
