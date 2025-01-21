<?php
namespace Repositories;

use Lib\Database;
use Models\Usuario;
use PDO;

class UsuarioRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function save(Usuario $usuario) {
        try {
            $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, rol) 
                    VALUES (:nombre, :apellidos, :email, :password, :rol)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':nombre' => $usuario->getNombre(),
                ':apellidos' => $usuario->getApellidos(),
                ':email' => $usuario->getEmail(),
                ':password' => $usuario->getPassword(),
                ':rol' => $usuario->getRol()
            ]);
            
            return $this->db->lastInsertId();
        } catch (\PDOException $e) {
            throw new \Exception("Error al guardar el usuario: " . $e->getMessage());
        }
    }

    public function findByEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':email' => $email]);
        
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Usuario($row);
        }
        return null;
    }
}
?>