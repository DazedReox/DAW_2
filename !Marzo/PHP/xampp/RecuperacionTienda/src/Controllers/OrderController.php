<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    private $orderRepository;

    public function __construct()
    {
        $this->orderRepository = new OrderRepository();
    }

    // Mostrar todos los pedidos
    public function index(){
        $orders = $this->orderRepository->getAllOrders();
        return $this->view('orders/index', ['orders' => $orders]);
    }

    // Mostrar un pedido específico
    public function show($id)
    {
        $order = $this->orderRepository->getOrderById($id);
        if (!$order) {
            return $this->view('errors/404');
        }
        return $this->view('orders/show', ['order' => $order]);
    }

    // Crear un nuevo pedido (formulario)
    public function create()
    {
        return $this->view('orders/create');
    }

    // Guardar un nuevo pedido
    public function store()
    {
        $data = [
            'user_id' => $_POST['user_id'] ?? null,
            'status' => $_POST['status'] ?? 'pendiente',
            'total' => $_POST['total'] ?? 0
        ];

        $this->validateOrderData($data);

        if ($this->orderRepository->createOrder($data)) {
            header('Location: /orders');
        } else {
            return $this->view('orders/create', ['error' => 'Error al crear el pedido.']);
        }
    }

    // Editar un pedido (formulario)
    public function edit($id)
    {
        $order = $this->orderRepository->getOrderById($id);
        if (!$order) {
            return $this->view('errors/404');
        }
        return $this->view('orders/edit', ['order' => $order]);
    }

    // Actualizar un pedido existente
    public function update($id)
    {
        $data = [
            'status' => $_POST['status'] ?? 'pendiente',
            'total' => $_POST['total'] ?? 0
        ];

        $this->validateOrderData($data);

        if ($this->orderRepository->updateOrder($id, $data)) {
            header('Location: /orders');
        } else {
            return $this->view('orders/edit', ['order' => $data, 'error' => 'Error al actualizar el pedido.']);
        }
    }

    // Eliminar un pedido
    public function delete($id)
    {
        if ($this->orderRepository->deleteOrder($id)) {
            header('Location: /orders');
        } else {
            return $this->view('errors/500', ['error' => 'Error al eliminar el pedido.']);
        }
    }
   
    // Validación de datos del pedido
    private function validateOrderData($data)
    {
        if (empty($data['status'])) {
            die('El estado del pedido es obligatorio.');
        }

        if (!is_numeric($data['total']) || $data['total'] < 0) {
            die('El total debe ser un número válido.');
        }
    }
}
?>