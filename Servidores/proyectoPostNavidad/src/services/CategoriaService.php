<?php
namespace Services;

use Models\Categoria;
use Repositories\CategoriaRepository;

class CategoriaService {
    private $repository;

    public function __construct() {
        $this->repository = new CategoriaRepository();
    }

    public function getAllCategorias() {
        return $this->repository->findAll();
    }

    public function saveCategoria($datos) {
        if (empty($datos['nombre'])) {
            throw new \Exception("El nombre de la categoría es obligatorio");
        }
        
        $categoria = new Categoria($datos);
        return $this->repository->save($categoria);
    }

    public function getCategoria($id) {
        return $this->repository->find($id);
    }
}
?>