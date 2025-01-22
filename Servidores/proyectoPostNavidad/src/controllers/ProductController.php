<?php
namespace Controllers;

use Services\ProductoService;
use Services\CategoriaService;
use Lib\Utils;

class ProductoController {
    private $service;
    private $categoriaService;

    public function __construct() {
        $this->service = new ProductoService();
        $this->categoriaService = new CategoriaService();
    }

    public function gestion() {
        if (!Utils::isAdmin()) {
            header("Location: " . BASE_URL);
            return;
        }
        
        $productos = $this->service->getAllProductos();
        require_once 'views/producto/gestion.php';
    }

    public function create() {
        if (!Utils::isAdmin()) {
            header("Location: " . BASE_URL);
            return;
        }

        $categorias = $this->categoriaService->getAllCategorias();
        require_once 'views/producto/create.php';
    }

    public function save() {
        if (!Utils::isAdmin()) {
            header("Location: " . BASE_URL);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = '';
            if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
                $imagen = Utils::uploadImage($_FILES['imagen'], 'uploads/productos/');
            }

            $datos = [
                'nombre' => $_POST['nombre'] ?? '',
                'descripcion' => $_POST['descripcion'] ?? '',
                'precio' => $_POST['precio'] ?? 0,
                'stock' => $_POST['stock'] ?? 0,
                'categoria_id' => $_POST['categoria_id'] ?? null,
                'imagen' => $imagen
            ];

            try {
                $this->service->saveProducto($datos);
                $_SESSION['mensaje'] = "Producto guardado correctamente";
            } catch (\Exception $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
        header("Location: " . BASE_URL . "/producto/gestion");
    }

    public function porCategoria($categoriaId) {
        $pagina = $_GET['pagina'] ?? 1;
        $productosPorPagina = 12;
        
        $productos = $this->service->getProductosPorCategoria($categoriaId, $pagina, $productosPorPagina);
        $total = $this->service->getTotalProductosPorCategoria($categoriaId);
        
        require_once 'views/producto/lista.php';
    }
}
?>