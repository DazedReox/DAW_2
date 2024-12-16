<?php
namespace App\Controllers;
use App\Helpers\Auth;
use App\Models\Usuario;
class AuthController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function showLoginForm()
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($username) || empty($password)) {
                echo "Por favor, completa todos los campos.";
                return;
            }

            $user = $this->usuarioModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                Auth::login($user['username'], $user['role']);
                header("Location: /");
                exit;
            } else {
                echo "Nombre de usuario o contraseña incorrectos.";
            }
        }
    }

    public function showRegisterForm()
    {
        require_once __DIR__ . '/../Views/auth/register.php';
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['rol'] ?? 'empleado';

            if (empty($nombre) || empty($username) || empty($password)) {
                echo "Por favor, completa todos los campos.";
                return;
            }

            if ($this->usuarioModel->findByUsername($username)) {
                echo "El nombre de usuario ya está en uso.";
                return;
            }

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $this->usuarioModel->create([
                'nombre' => $nombre,
                'username' => $username,
                'password' => $hashedPassword,
                'role' => $role
            ]);

            echo "Usuario registrado exitosamente. Ahora puedes iniciar sesión.";
            header("Location: /login");
            exit;
        }
    }

    public function logout()
    {
        Auth::logout();
        header("Location: /");
        exit;
    }
}
?>
