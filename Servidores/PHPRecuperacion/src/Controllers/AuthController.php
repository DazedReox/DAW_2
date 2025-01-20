<?php
namespace App\Controllers;
use src\Models\Usuario;

class AuthController{

    private $usuarioModel;
    public function __construct(){
        $this->usuarioModel = new Usuario();
    }

    public function showLoginForm()
    {
        //formulario login
        require_once __DIR__ . '/../Views/FormLogin.php';
    }

    //login
    public function login(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //datos del formualrio
            $username = $_POST['username'];
            $password = $_POST['password'];

            //no hay campos vacios
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["name"])){
                    $nameErr = "El nombre esta vacío";
                    $passwordOk = false;
                }else{
                    $name = test_input($_POST["name"]);
                    $passwordOk = true;
                }
            }
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["email"])){
                    $emailErr = "El email esta vacio";
                    $passwordOk = false;
                }else{
                    $email = test_input($_POST["email"]);
                    $passwordOk = true;
                }
            }

            $user = $this->usuarioModel->findByUsername($username);
        }
    }
    public function showRegisterForm()
    {
        //direccion del formulario
        require_once __DIR__ . '/../Views/FormRegister.php';
    }

    //registro
    public function register()
    {
        //recibe datos
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nombre = $_POST['nombre'] ?? '';
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            //comprobacion de que no esten vacios los campos
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["name"])){
                    $nameErr = "El nombre esta vacío";
                    $passwordOk = false;
                }else{
                    $name = test_input($_POST["name"]);
                    $passwordOk = true;
                }
            }
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_POST["email"])){
                    $emailErr = "Email is required";
                    $passwordOk = false;
                }else{
                    $email = test_input($_POST["email"]);
                    $passwordOk = true;
                }
            }

            //comprueba si existe el usuario
            if ($this->usuarioModel->findByUsername($username)) {
                echo "El usuario ya existe";
                return;
            }
            header("Location: /login");
            exit;
        }
    }
}
?>
