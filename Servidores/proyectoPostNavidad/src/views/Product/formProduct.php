<?php 
    namespace Controllers;
    use Models\Product;
    use Models\Category;
    use Lib\Pages;
    use Lib\Router;

    class ProductController extends Pages{ 
        public static function index(){
            $categories = Category::all();
            $pages = new Pages();
            $pages->render('Productos/formProduct', ['categories' => $categories]);
        }
    }
?>