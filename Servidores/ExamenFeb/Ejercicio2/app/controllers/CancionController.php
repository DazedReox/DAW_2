<?php

namespace App\Controllers;

use App\Core\Database;
use App\Core\JWT;
use PDO;

class CancionController
{
    private $db;
    private $jwt;

    public function __construct()
    {
        $this->db = (new Database())->getConnection();
        $this->jwt = new JWT();
    }

    public function getCancion($listaNombre, $titulo)
    {
        $stmt = $this->db->prepare("SELECT * FROM canciones WHERE lista_nombre = :listaNombre AND titulo = :titulo");
        $stmt->execute(['listaNombre' => $listaNombre, 'titulo' => $titulo]);
        $cancion = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($cancion) {
            echo json_encode($cancion);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Canción no encontrada']);
        }
    }

    public function addCancion($listaNombre)
    {
        $data = json_decode(file_get_contents('php://input'), true);

        // Validar datos
        if (empty($data['titulo']) || empty($data['artista'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Datos inválidos']);
            return;
        }

        $stmt = $this->db->prepare("INSERT INTO canciones (lista_nombre, titulo, artista) VALUES (:listaNombre, :titulo, :artista)");
        $stmt->execute([
            'listaNombre' => $listaNombre,
            'titulo' => $data['titulo'],
            'artista' => $data['artista']
        ]);

        http_response_code(201);
        echo json_encode(['message' => 'Canción añadida']);
    }

    public function deleteCancion($listaNombre, $titulo)
    {
        $stmt = $this->db->prepare("DELETE FROM canciones WHERE lista_nombre = :listaNombre AND titulo = :titulo");
        $stmt->execute(['listaNombre' => $listaNombre, 'titulo' => $titulo]);

        if ($stmt->rowCount() > 0) {
            echo json_encode(['message' => 'Canción eliminada']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Canción no encontrada']);
        }
    }
}
?>