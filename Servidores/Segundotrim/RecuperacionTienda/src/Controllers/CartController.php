<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\ProductRepository;

class CartController extends Controller{

    private $productRepository;

    public function __construct(){
        $this->productRepository = new ProductRepository();
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    //mostar carrito
    public function index(){
        $cart = $_SESSION['cart'];
        return $this->view('cart/index', ['cart' => $cart]);
    }

    //añadior algo al carrito
    public function add($productId){
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

    //updatear carrito
    public function update($productId){
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

    //delete carrito
    public function remove($productId){
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }

        header('Location: /cart');
    }

    //vaciar carrito
    public function clear(){
        $_SESSION['cart'] = [];
        header('Location: /cart');
    }

    //total
    private function calculateTotal(){
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['product']['price'] * $item['quantity'];
        }
        return $total;
    }
}
?>