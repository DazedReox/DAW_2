<?php
namespace Controllers;

use Services\UsuarioService;

class UsuarioController {
    private $service;

    public function __construct() {
        $this->service = new UsuarioService();
        session_start();
    }

    public function showRegistroForm() {
        require_once 'views/usuario/registro.php';
    }

    public function registro() {
        try {
            $datos = [
                'nombre' => $_POST['nombre'] ?? '',
                'apellidos' => $_POST['apellidos'] ?? '',
                'email' => $_POST['email'] ?? '',
                'password' => $_POST['password'] ?? '',
                'rol' => 'cliente'
            ];

            $userId = $this->service->registrarUsuario($datos);
            $_SESSION['mensaje'] = "Usuario registrado correctamente";
            header("Location: " . BASE_URL);
        } catch (\Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header("Location: " . BASE_URL . "/usuario/registro");
        }
    }

    public function login() {
        try {
            $usuario = $this->service->login($_POST['email'], $_POST['password']);
            $_SESSION['usuario_id'] = $usuario->getId();
            $_SESSION['usuario_nombre'] = $usuario->getNombre();
            $_SESSION['usuario_rol'] = $usuario->getRol();
            header("Location: " . BASE_URL);
        } catch (\Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header("Location: " . BASE_URL . "/login");
        }
    }

    public function logout() {
        session_destroy();
        header("Location: " . BASE_URL);
    }
}
?>