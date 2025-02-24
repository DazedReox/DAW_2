<?php

namespace App\Controllers;

use App\Models\ListaModel;
use App\Core\Database;

class ListaController
{
    private $listaModel;

    public function __construct()
    {
        $this->listaModel = new ListaModel();
    }

    //todas las listas
    public function getAll()
    {
        $listas = $this->listaModel->getAll();
        echo json_encode($listas);
    }

    //tiene lista
    public function getByName($listaNombre)
    {
        $lista = $this->listaModel->getByName($listaNombre);

        if ($lista) {
            echo json_encode($lista);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Lista no encontrada']);
        }
    }

    //nueva lista
    public function create()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if (empty($data['nombre'])) {
            http_response_code(400);
            echo json_encode(['error' => 'El nombre de la lista es requerido']);
            return;
        }

        $nombre = $data['nombre'];
        $result = $this->listaModel->create($nombre);

        if ($result) {
            http_response_code(201);
            echo json_encode(['message' => 'Lista creada']);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Error al crear la lista']);
        }
    }

    //borra lista 
    public function delete($listaNombre)
    {
        $result = $this->listaModel->delete($listaNombre);

        if ($result) {
            echo json_encode(['message' => 'Lista eliminada']);
        } else {
            http_response_code(404);
            echo json_encode(['error' => 'Lista no encontrada']);
        }
    }
}
?>