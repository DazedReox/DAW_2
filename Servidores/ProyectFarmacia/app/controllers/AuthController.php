<?php
// sirven como el intermediario que conecta las solicitudes del usuario con la lógica de negocio y las respuestas que se deben enviar


// Se define el namespace para organizar las clases en el proyecto.
namespace App\Controllers;

// Se importan las clases necesarias desde otros namespaces.
use App\Helpers\Auth; // Clase para manejar autenticación.
use App\Models\Usuario; // Modelo para interactuar con la base de datos sobre usuarios.

// Se define la clase principal del controlador de autenticación.
class AuthController
{
    // Atributo privado para manejar el modelo de usuario.
    private $usuarioModel;

    // Constructor de la clase, inicializa el modelo de usuario.
    public function __construct()
    {
        $this->usuarioModel = new Usuario(); // Crea una instancia del modelo Usuario.
    }

    // Método para mostrar el formulario de inicio de sesión.
    public function showLoginForm()
    {
        // Se incluye la vista correspondiente para mostrar el formulario de login.
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    // Método para manejar el proceso de inicio de sesión.
    public function login()
    {
        // Verifica si la solicitud es de tipo POST (envío de datos del formulario).
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Se obtienen los datos enviados desde el formulario.
            $username = $_POST['username'] ?? ''; // Nombre de usuario o valor vacío si no se envía.
            $password = $_POST['password'] ?? ''; // Contraseña o valor vacío si no se envía.

            // Validación básica para verificar que los campos no estén vacíos.
            if (empty($username) || empty($password)) {
                echo "Por favor, completa todos los campos.";
                return; // Se detiene la ejecución del método.
            }

            // Busca al usuario en la base de datos utilizando el modelo.
            $user = $this->usuarioModel->findByUsername($username);

            // Verifica si el usuario existe y si la contraseña es correcta.
            if ($user && password_verify($password, $user['password'])) {
                // Autentica al usuario utilizando el helper Auth.
                Auth::login($user['username'], $user['role']);
                // Redirige al usuario a la página principal después del inicio de sesión.
                header("Location: /");
                exit;
            } else {
                // Mensaje de error si el usuario o la contraseña no son válidos.
                echo "Nombre de usuario o contraseña incorrectos.";
            }
        }
    }

    // Método para mostrar el formulario de registro.
    public function showRegisterForm()
    {
        // Se incluye la vista correspondiente para mostrar el formulario de registro.
        require_once __DIR__ . '/../Views/auth/register.php';
    }

    // Método para manejar el registro de un nuevo usuario.
    public function register()
    {
        // Verifica si la solicitud es de tipo POST (envío de datos del formulario).
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Se obtienen los datos enviados desde el formulario.
            $nombre = $_POST['nombre'] ?? ''; // Nombre del usuario.
            $username = $_POST['username'] ?? ''; // Nombre de usuario.
            $password = $_POST['password'] ?? ''; // Contraseña.
            $role = $_POST['rol'] ?? 'empleado'; // Rol del usuario, por defecto "empleado".

            // Validación básica para verificar que los campos no estén vacíos.
            if (empty($nombre) || empty($username) || empty($password)) {
                echo "Por favor, completa todos los campos.";
                return; // Se detiene la ejecución del método.
            }

            // Verifica si el nombre de usuario ya existe en la base de datos.
            if ($this->usuarioModel->findByUsername($username)) {
                echo "El nombre de usuario ya está en uso.";
                return; // Se detiene la ejecución del método.
            }

            // Encripta la contraseña antes de almacenarla en la base de datos.
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Crea un nuevo usuario utilizando el modelo.
            $this->usuarioModel->create([
                'nombre' => $nombre,
                'username' => $username,
                'password' => $hashedPassword,
                'role' => $role
            ]);

            // Mensaje de éxito y redirección al formulario de inicio de sesión.
            echo "Usuario registrado exitosamente. Ahora puedes iniciar sesión.";
            header("Location: /login");
            exit;
        }
    }

    // Método para cerrar sesión.
    public function logout()
    {
        // Llama al helper Auth para cerrar la sesión del usuario.
        Auth::logout();
        // Redirige al usuario a la página principal después de cerrar la sesión.
        header("Location: /");
        exit;
    }
}
?>
