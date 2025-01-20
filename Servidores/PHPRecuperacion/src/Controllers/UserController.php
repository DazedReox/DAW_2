<?php
namespace src\Controllers;
use src\Models\Usuario;
class UsuarioController{
    
    private $usuarioModel;
    public function __construct(){
        $this->usuarioModel = new Usuario();
    }
    public function index(){
        require_once __DIR__ . '/../Views/index.php';
    }

    public function showCreateForm(){
        require_once __DIR__ . '/../Views/create.php';
    }

    public function create(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'];
            $password = $_POST['password'];

            if (empty($nombre) || empty($password)) {
                echo "Hay campos vacios";
                return;
            }
            $this->usuarioModel->create([
                'nombre' => $nombre,
                'password' => $password
            ]);
            echo "Usuario creado exitosamente.";
            header("Location: /");
            exit;
        }
    }
}
?>