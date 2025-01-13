<?php 
    namespace Controllers;
    use Lib\Pages;

    class ProductController{
        public static function index(){
            $pages = new Pages();
            $pages->render('Productos\index');
        }
    }
?>