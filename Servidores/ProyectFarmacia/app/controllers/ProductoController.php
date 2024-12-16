<?php
namespace App\Controllers;
use App\Models\Producto;
class ProductoController
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new Producto();
    }

    public function index()
    {
        $productos = $this->productoModel->getAll();
        require_once __DIR__ . '/../Views/productos/index.php';
    }

    public function showCreateForm()
    {
        require_once __DIR__ . '/../Views/productos/create.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $precio = $_POST['precio'] ?? 0.0;

            if (empty($nombre) || $cantidad <= 0 || $precio <= 0) {
                echo "Por favor, completa todos los campos correctamente.";
                return;
            }

            $this->productoModel->create([
                'nombre' => $nombre,
                'cantidad' => $cantidad,
                'precio' => $precio
            ]);

            echo "Producto creado exitosamente.";
            header("Location: /productos");
            exit;
        }
    }

    public function showEditForm($id)
    {
        $producto = $this->productoModel->findById($id);

        if (!$producto) {
            echo "Producto no encontrado.";
            return;
        }

        require_once __DIR__ . '/../Views/productos/edit.php';
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $precio = $_POST['precio'] ?? 0.0;

            if (empty($nombre) || $cantidad <= 0 || $precio <= 0) {
                echo "Por favor, completa todos los campos correctamente.";
                return;
            }

            $this->productoModel->update($id, [
                'nombre' => $nombre,
                'cantidad' => $cantidad,
                'precio' => $precio
            ]);

            echo "Producto actualizado exitosamente.";
            header("Location: /productos");
            exit;
        }
    }

    public function delete($id)
    {
        $this->productoModel->delete($id);
        echo "Producto eliminado exitosamente.";
        header("Location: /productos");
        exit;
    }
}
?>
