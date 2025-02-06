<?php

namespace App\Repositories;

use App\Core\Database;
use PDO;

class UserRepository{
    
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    //ver todos los usuarios
    public function getAllUsers(){
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //usuario por su id
    public function getUserById($id){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //usuario por email
    public function getUserByEmail($email){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //hacer un usuario nuevo
    public function createUser($data){
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        return $stmt->execute($data);
    }

    //actualizar user
    public function updateUser($id, $data){
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id");
        return $stmt->execute($data);
    }

    //borrar usuario
    public function deleteUser($id){
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>