<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\UserRepository;
use App\Core\Auth;

class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    // Mostrar formulario de registro
    public function register()
    {
        return $this->view('users/register');
    }

    // Procesar registro de usuario
    public function store()
    {
        $data = [
            'username' => $_POST['username'] ?? '',
            'email' => $_POST['email'] ?? '',
            'password' => password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT)
        ];

        $this->validateUserData($data);

        if ($this->userRepository->createUser($data)) {
            header('Location: /login');
        } else {
            return $this->view('users/register', ['error' => 'Error al registrar el usuario.']);
        }
    }

    // Mostrar formulario de inicio de sesión
    public function login()
    {
        return $this->view('users/login');
    }

    // Procesar inicio de sesión
    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $this->userRepository->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            Auth::login($user);
            header('Location: /');
        } else {
            return $this->view('users/login', ['error' => 'Credenciales incorrectas.']);
        }
    }

    //logout
    public function logout(){
        Auth::logout();
        header('Location: /login');
    }

    //enseñar el perfil
    public function profile(){
        $user = Auth::user();
        if (!$user){
            header('Location: /login');
            exit;
        }
        return $this->view('users/profile', ['user' => $user]);
    }

    //comprobacion de los datos 
    private function validateUserData($data){
        if (empty($data['username']) || empty($data['email']) || empty($data['password'])){
            die('Los campos son obligatorios');
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
            die('El correo no es valido');
        }
    }
}
?>