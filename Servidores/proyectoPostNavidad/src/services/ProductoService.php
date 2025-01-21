<?php
namespace Services;

use Models\Producto;
use Repositories\ProductoRepository;

class ProductoService {
    private $repository;

    public function __construct() {
        $this->repository = new ProductoRepository();
    }

    public function getAllProductos() {
        return $this->repository->findAll();
    }

    public function saveProducto($datos) {
        if (empty($datos['nombre']) || empty($datos['precio'])) {
            throw new \Exception("El nombre y precio son obligatorios");
        }
        
        $producto = new Producto($datos);
        return $this->repository->save($producto);
    }

    public function getProducto($id) {
        return $this->repository->find($id);
    }

    public function getProductosPorCategoria($categoriaId, $pagina, $porPagina) {
        return $this->repository->findByCategoria($categoriaId, $pagina, $porPagina);
    }

    public function getTotalProductosPorCategoria($categoriaId) {
        return $this->repository->countByCategoria($categoriaId);
    }
}
?>