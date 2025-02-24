<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
    }

    //busca user
    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //new user
    public function create($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO usuarios (username, password) VALUES (:username, :password)");
        return $stmt->execute([
            'username' => $username,
            'password' => $hashedPassword
        ]);
    }
}
?>