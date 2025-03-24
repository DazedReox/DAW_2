<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    // Mostrar la lista de productos
    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return $this->view('products/index', ['products' => $products]);
    }

    // Mostrar un producto específico
    public function show($id)
    {
        $product = $this->productRepository->getProductById($id);
        if (!$product) {
            return $this->view('errors/404');
        }
        return $this->view('products/show', ['product' => $product]);
    }

    // Crear un nuevo producto (formulario)
    public function create()
    {
        return $this->view('products/create');
    }

    // Guardar un nuevo producto
    public function store()
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'price' => $_POST['price'] ?? 0,
            'category_id' => $_POST['category_id'] ?? null
        ];

        $this->validateProductData($data);

        if ($this->productRepository->createProduct($data)) {
            header('Location: /products');
        } else {
            return $this->view('products/create', ['error' => 'Error al crear el producto.']);
        }
    }

    // Editar un producto (formulario)
    public function edit($id)
    {
        $product = $this->productRepository->getProductById($id);
        if (!$product) {
            return $this->view('errors/404');
        }
        return $this->view('products/edit', ['product' => $product]);
    }

    // Actualizar un producto existente
    public function update($id)
    {
        $data = [
            'name' => $_POST['name'] ?? '',
            'description' => $_POST['description'] ?? '',
            'price' => $_POST['price'] ?? 0,
            'category_id' => $_POST['category_id'] ?? null
        ];

        $this->validateProductData($data);

        if ($this->productRepository->updateProduct($id, $data)) {
            header('Location: /products');
        } else {
            return $this->view('products/edit', ['product' => $data, 'error' => 'Error al actualizar el producto.']);
        }
    }

    // Eliminar un producto
    public function delete($id)
    {
        if ($this->productRepository->deleteProduct($id)) {
            header('Location: /products');
        } else {
            return $this->view('errors/500', ['error' => 'Error al eliminar el producto.']);
        }
    }

    // Validación de datos del producto
    private function validateProductData($data)
    {
        if (empty($data['name']) || empty($data['price'])) {
            die('Nombre y precio son obligatorios.');
        }

        if (!is_numeric($data['price']) || $data['price'] < 0) {
            die('El precio debe ser un número válido.');
        }
    }
}
?>