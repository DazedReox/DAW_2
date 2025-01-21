<?php
namespace Repositories;

use Lib\Database;
use Models\Producto;
use PDO;

class ProductoRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function save(Producto $producto) {
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, oferta, imagen, categoria_id) 
                VALUES (:nombre, :descripcion, :precio, :stock, :oferta, :imagen, :categoria_id)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nombre' => $producto->getNombre(),
            ':descripcion' => $producto->getDescripcion(),
            ':precio' => $producto->getPrecio(),
            ':stock' => $producto->getStock(),
            ':oferta' => $producto->getOferta(),
            ':imagen' => $producto->getImagen(),
            ':categoria_id' => $producto->getCategoriaId()
        ]);
        
        return $this->db->lastInsertId();
    }

    public function update(Producto $producto) {
        $sql = "UPDATE productos 
                SET nombre = :nombre, 
                    descripcion = :descripcion, 
                    precio = :precio, 
                    stock = :stock, 
                    oferta = :oferta, 
                    imagen = :imagen, 
                    categoria_id = :categoria_id 
                WHERE id = :id";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $producto->getId(),
            ':nombre' => $producto->getNombre(),
            ':descripcion' => $producto->getDescripcion(),
            ':precio' => $producto->getPrecio(),
            ':stock' => $producto->getStock(),
            ':oferta' => $producto->getOferta(),
            ':imagen' => $producto->getImagen(),
            ':categoria_id' => $producto->getCategoriaId()
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function find($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Producto($row);
        }
        return null;
    }

    public function findAll() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        
        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = new Producto($row);
        }
        return $productos;
    }

    public function findByCategoria($categoriaId, $pagina = 1, $porPagina = 10) {
        $offset = ($pagina - 1) * $porPagina;
        
        $sql = "SELECT * FROM productos 
                WHERE categoria_id = :categoria_id 
                ORDER BY id DESC 
                LIMIT :offset, :limit";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':categoria_id', $categoriaId, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $porPagina, PDO::PARAM_INT);
        $stmt->execute();
        
        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = new Producto($row);
        }
        return $productos;
    }

    public function countByCategoria($categoriaId) {
        $sql = "SELECT COUNT(*) as total FROM productos WHERE categoria_id = :categoria_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':categoria_id' => $categoriaId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) $result['total'];
    }

    public function findByIds(array $ids) {
        if (empty($ids)) {
            return [];
        }

        $placeholders = str_repeat('?,', count($ids) - 1) . '?';
        $sql = "SELECT * FROM productos WHERE id IN ($placeholders)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($ids);
        
        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = new Producto($row);
        }
        return $productos;
    }

    public function updateStock(int $productoId, int $cantidad) {
        $sql = "UPDATE productos 
                SET stock = stock - :cantidad 
                WHERE id = :id AND stock >= :cantidad";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $productoId,
            ':cantidad' => $cantidad
        ]);
    }

    public function findInOferta() {
        $sql = "SELECT * FROM productos WHERE oferta = 1 ORDER BY id DESC";
        $stmt = $this->db->query($sql);
        
        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $productos[] = new Producto($row);
        }
        return $productos;
    }
}
?>