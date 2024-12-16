<?php
namespace App\Controllers;
use App\Models\Producto;
class StockController
{
    private $productoModel;

    public function __construct()
    {
        $this->productoModel = new Producto();
    }

    public function showUpdateForm($id)
    {
        $producto = $this->productoModel->findById($id);

        if (!$producto) {
            echo "Producto no encontrado.";
            return;
        }

        require_once __DIR__ . '/../Views/stock/update.php';
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cantidad = $_POST['cantidad'] ?? 0;

            if ($cantidad <= 0) {
                echo "La cantidad debe ser un número mayor que cero.";
                return;
            }

            $this->productoModel->updateStock($id, $cantidad);

            echo "Stock actualizado exitosamente.";
            header("Location: /productos");
            exit;
        }
    }
}
?>
