<?php 
    namespace Lib;

    class Router{
        private static function index(){
            Router::add('GET', '/', function(){
                (new DashboardController())->index();
            });
            Router::add('GET', '/not-found', function(){
                ErrorController::error404();
            });

            Router::dispatch();
        }
    }
?>