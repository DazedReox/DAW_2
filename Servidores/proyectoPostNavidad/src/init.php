<?php 
    sesion_start();

    use Routes\Routes;

    require_once "../vendor/autoload.php";
    require_once "../Config/config.php";

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->safeLoad();

    Router::index();
?>