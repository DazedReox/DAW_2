<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private $connection;

    public function __construct()
    {
        $config = include __DIR__ . '/../../config/config.php';
        $dbConfig = $config['database'];

        try {
            $this->connection = new PDO(
                "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}",
                $dbConfig['user'],
                $dbConfig['password']
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
?>