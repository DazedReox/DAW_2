<?php

namespace App\Core;

class Controller
{
    // Renderizar una vista
    protected function view($view, $data = [])
    {
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (file_exists($viewPath)) {
            extract($data);
            require $viewPath;
        } else {
            die('La vista no existe: ' . $view);
        }
    }

    // Redirigir a una URL específica
    protected function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
?>