<?php
namespace Controllers;

use Services\CategoriaService;
use Lib\Utils;

class CategoriaController {
    private $service;

    public function __construct() {
        $this->service = new CategoriaService();
    }

    public function index() {
        $categorias = $this->service->getAllCategorias();
        require_once 'views/categoria/index.php';
    }

    public function create() {
        if (!Utils::isAdmin()) {
            header("Location: " . BASE_URL);
            return;
        }
        require_once 'views/categoria/create.php';
    }

    public function save() {
        if (!Utils::isAdmin()) {
            header("Location: " . BASE_URL);
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';

            try {
                $this->service->saveCategoria(['nombre' => $nombre, 'descripcion' => $descripcion]);
                $_SESSION['mensaje'] = "Categoría creada correctamente";
            } catch (\Exception $e) {
                $_SESSION['error'] = $e->getMessage();
            }
        }
        header("Location: " . BASE_URL . "/categoria");
    }
}
?>