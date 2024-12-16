<?php
namespace App\Controllers;
use App\Models\Usuario;
class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }
    public function index()
    {
        if ($_SESSION['role'] != 'propietario') {
            echo "Acceso denegado.";
            return;
        }

        $usuarios = $this->usuarioModel->getAll();
        require_once __DIR__ . '/../Views/usuarios/index.php';
    }

    public function showCreateForm()
    {
        require_once __DIR__ . '/../Views/usuarios/create.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['rol'] ?? 'empleado';

            if (empty($nombre) || empty($username) || empty($password)) {
                echo "Por favor, completa todos los campos correctamente.";
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

            echo "Usuario creado exitosamente.";
            header("Location: /usuarios");
            exit;
        }
    }

    public function showEditForm($id)
    {
        $usuario = $this->usuarioModel->findById($id);

        if (!$usuario) {
            echo "Usuario no encontrado.";
            return;
        }

        require_once __DIR__ . '/../Views/usuarios/edit.php';
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['rol'] ?? 'empleado';

            if (empty($nombre) || empty($username)) {
                echo "Por favor, completa todos los campos correctamente.";
                return;
            }

            $data = [
                'nombre' => $nombre,
                'username' => $username,
                'role' => $role
            ];

            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            $this->usuarioModel->update($id, $data);

            echo "Usuario actualizado exitosamente.";
            header("Location: /usuarios");
            exit;
        }
    }

    public function delete($id)
    {
        if ($_SESSION['role'] != 'propietario') {
            echo "Acceso denegado.";
            return;
        }

        $this->usuarioModel->delete($id);
        echo "Usuario eliminado exitosamente.";
        header("Location: /usuarios");
        exit;
    }

    public function showProfile()
    {
        $usuario = $this->usuarioModel->findByUsername($_SESSION['username']);
        require_once __DIR__ . '/../Views/usuarios/perfil.php';
    }

    public function updateProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($nombre) || empty($username)) {
                echo "Por favor, completa todos los campos correctamente.";
                return;
            }

            $data = [
                'nombre' => $nombre,
                'username' => $username
            ];

            if (!empty($password)) {
                $data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            $this->usuarioModel->updateByUsername($_SESSION['username'], $data);

            echo "Perfil actualizado exitosamente.";
            header("Location: /perfil");
            exit;
        }
    }
}
?>
