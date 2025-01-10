<?php 
    namespace Controllers;
    use Lib\Pages;
    class AuthController{
        private Pages $pages;
        
        public function _construct(){
            $this->pages = new Pages();
        }
        public static function login(){   
            $pages = new Pages();
            $pages->render('Auth\login');
        }
        public static function register(){
            if([$_SERVER['REQUEST_METHOD'] == 'POST']){
                $pages = new Pages();
                $pages->render('Auth\register');
            }
        }
    }
?>