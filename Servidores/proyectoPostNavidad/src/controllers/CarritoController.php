<?php
namespace Controllers;

use Services\ProductoService;
use Lib\Utils;

class CarritoController {
    private $productoService;

    public function __construct() {
        $this->productoService = new ProductoService();
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
    }

    public function index() {
        $carrito = $_SESSION['carrito'];
        $total = Utils::getCarritoTotal();
        require_once 'views/carrito/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoId = $_POST['producto_id'] ?? null;
            $cantidad = $_POST['cantidad'] ?? 1;

            if ($productoId) {
                $producto = $this->productoService->getProducto($productoId);
                
                if ($producto) {
                    if (isset($_SESSION['carrito'][$productoId])) {
                        $_SESSION['carrito'][$productoId]['cantidad'] += $cantidad;
                    } else {
                        $_SESSION['carrito'][$productoId] = [
                            'id' => $producto->getId(),
                            'nombre' => $producto->getNombre(),
                            'precio' => $producto->getPrecio(),
                            'cantidad' => $cantidad
                        ];
                    }
                    $_SESSION['mensaje'] = "Producto añadido al carrito";
                }
            }
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }

    public function remove($productoId) {
        if (isset($_SESSION['carrito'][$productoId])) {
            unset($_SESSION['carrito'][$productoId]);
            $_SESSION['mensaje'] = "Producto eliminado del carrito";
        }
        header("Location: " . BASE_URL . "/carrito");
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productoId = $_POST['producto_id'] ?? null;
            $cantidad = $_POST['cantidad'] ?? 0;

            if ($productoId && isset($_SESSION['carrito'][$productoId])) {
                if ($cantidad > 0) {
                    $_SESSION['carrito'][$productoId]['cantidad'] = $cantidad;
                } else {
                    unset($_SESSION['carrito'][$productoId]);
                }
            }
        }
        header("Location: " . BASE_URL . "/carrito");
    }

    public function clear() {
        $_SESSION['carrito'] = [];
        $_SESSION['mensaje'] = "Carrito vaciado correctamente";
        header("Location: " . BASE_URL . "/carrito");
    }
}
?>