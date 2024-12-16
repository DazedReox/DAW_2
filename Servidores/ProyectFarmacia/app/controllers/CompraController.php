<?php
namespace App\Controllers;
use App\Models\Compra;
class CompraController
{
    private $compraModel;

    public function __construct()
    {
        $this->compraModel = new Compra();
    }

    public function showCreateForm()
    {
        require_once __DIR__ . '/../Views/compras/create.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clienteId = $_POST['cliente_id'] ?? null;
            $productoId = $_POST['producto_id'] ?? null;
            $cantidad = $_POST['cantidad'] ?? 0;
            $total = $_POST['total'] ?? 0;

            if (!$clienteId || !$productoId || $cantidad <= 0 || $total <= 0) {
                echo "Todos los campos son obligatorios y deben ser válidos.";
                return;
            }

            $this->compraModel->register([
                'cliente_id' => $clienteId,
                'producto_id' => $productoId,
                'cantidad' => $cantidad,
                'total' => $total
            ]);

            echo "Compra registrada exitosamente.";
            header("Location: /compras");
            exit;
        }
    }

    public function index()
    {
        $compras = $this->compraModel->getAll();
        require_once __DIR__ . '/../Views/compras/index.php';
    }

    public function show($id)
    {
        $compra = $this->compraModel->findById($id);

        if (!$compra) {
            echo "Compra no encontrada.";
            return;
        }

        require_once __DIR__ . '/../Views/compras/show.php';
    }

    public function processPayment($id)
    {
        $compra = $this->compraModel->findById($id);

        if (!$compra) {
            echo "Compra no encontrada.";
            return;
        }
        $this->compraModel->markAsPaid($id);
        echo "Pago procesado correctamente.";
        header("Location: /compras");
        exit;
    }
}
?>
