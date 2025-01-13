<?php 
    namespace Controllers;
    use Models\Product;
    use Models\Category;
    use Lib\Pages;
    use Lib\Router;

    class ProductController extends Pages{
        public function formProduct(){
            $product = new Product();
            $category = new Category();
            $products = $product->getProducts();
            $categories = $category->getCategories();
            $this->render('Productos/formProduct', ['products' => $products, 'categories' => $categories]);
        }    
    }
?>