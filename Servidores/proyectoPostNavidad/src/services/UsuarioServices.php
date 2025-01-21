<?php
namespace Services;

use Models\Usuario;
use Repositories\UsuarioRepository;

class UsuarioService {
    private $repository;

    public function __construct() {
        $this->repository = new UsuarioRepository();
    }

    public function registrarUsuario($datos) {
        // Validaciones
        if (empty($datos['email']) || empty($datos['password'])) {
            throw new \Exception("Email y contraseña son requeridos");
        }

        if ($this->repository->findByEmail($datos['email'])) {
            throw new \Exception("El email ya está registrado");
        }

        $usuario = new Usuario($datos);
        return $this->repository->save($usuario);
    }

    public function login($email, $password) {
        $usuario = $this->repository->findByEmail($email);
        
        if (!$usuario || !password_verify($password, $usuario->getPassword())) {
            throw new \Exception("Credenciales inválidas");
        }

        return $usuario;
    }
}
?>