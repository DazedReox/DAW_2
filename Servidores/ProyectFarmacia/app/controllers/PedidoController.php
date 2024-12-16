<?php
namespace App\Controllers;
use App\Models\Pedido;
use App\Models\Producto;
use App\Helpers\Email;
class PedidoController
{
    private $pedidoModel;
    private $productoModel;

    public function __construct()
    {
        $this->pedidoModel = new Pedido();
        $this->productoModel = new Producto();
    }

    public function index()
    {
        $pedidos = $this->pedidoModel->getAll();
        require_once __DIR__ . '/../Views/pedidos/index.php';
    }

    public function showCreateForm()
    {
        $productos = $this->productoModel->getAll();
        require_once __DIR__ . '/../Views/pedidos/create.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clienteEmail = $_POST['cliente_email'] ?? '';
            $productoId = $_POST['producto_id'] ?? '';
            
            if (empty($clienteEmail) || empty($productoId)) {
                echo "Todos los campos son obligatorios.";
                return;
            }
            $this->pedidoModel->create([
                'cliente_email' => $clienteEmail,
                'producto_id' => $productoId,
                'estado' => 'pendiente'
            ]);
            echo "Pedido registrado exitosamente.";
            header("Location: /pedidos");
            exit;
        }
    }

    public function notify($id)
    {
        $pedido = $this->pedidoModel->findById($id);

        if (!$pedido) {
            echo "Pedido no encontrado.";
            return;
        }
        exit;
    }
}
?>
