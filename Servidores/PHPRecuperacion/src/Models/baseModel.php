<?php
namespace src\Models;
use PDO;
use PDOException;
class BaseModel{
    protected $db;

    public function __construct()
    {
        $host = 'localhost';
        $dbname = 'PHPRecuperacion';
        $username = 'root';
        $password = '';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'No se puede conectar a la base de datos: ' . $e->getMessage();
            exit;
        }
    }
}
?>