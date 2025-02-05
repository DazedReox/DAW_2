<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\ProductRepository;

class CartController extends Controller
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    // Mostrar el carrito
    public function index()
    {
        $cart = $_SESSION['cart'];
        return $this->view('cart/index', ['cart' => $cart]);
    }

    // Agregar un producto al carrito
    public function add($productId)
    {
        $product = $this->productRepository->getProductById($productId);

        if (!$product) {
            return $this->view('errors/404');
        }

        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            $_SESSION['cart'][$productId] = [
                'product' => $product,
                'quantity' => 1
            ];
        }

        header('Location: /cart');
    }

    // Actualizar la cantidad de un producto en el carrito
    public function update($productId)
    {
        $quantity = $_POST['quantity'] ?? 1;

        if (isset($_SESSION['cart'][$productId])) {
            if ($quantity > 0) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            } else {
                unset($_SESSION['cart'][$productId]);
            }
        }

        header('Location: /cart');
    }

    // Eliminar un producto del carrito
    public function remove($productId)
    {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

        header('Location: /cart');
    }

    // Vaciar el carrito
    public function clear()
    {
        $_SESSION['cart'] = [];
        header('Location: /cart');
    }

    // Calcular el total del carrito
    private function calculateTotal()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['product']['price'] * $item['quantity'];
        }
        return $total;
    }
}
?>