<?php 
    namespace src\Controllers;

    class Login{

        private $usuarioLogin;
        private $passwordOk = false;
        
        //funcion para que no se pueda añadir codigo externo en las casillas
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
        }

        public function __construct(){
            $this->usuarioLogin = new Login();
        }

        public function functionLogin(){
            require_once "../Views/FormLogin.php";
        }
        //login
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $password = $_POST['password'];
            }
            //comprobacion de que no este vacio
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
            //solo si la validacion de la contraseña coincide pasará a lo siguiente
            if($passwordOk){
                if($name && password_verify($password, $name['password'])){
                    header("Location: /");
                    exit;
                }else{
                    echo "Usuario o contrseña incorrectos";
                }
            }
        }
    }
?>