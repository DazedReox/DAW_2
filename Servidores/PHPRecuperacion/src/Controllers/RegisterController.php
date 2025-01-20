<?php 
    namespace src\Controllers;

    class Register{

        private $usuarioRegister;
        private $passwordOk = false;
        //funcion para que no se pueda añadir codigo externo en las casillas
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
        }

        public function __construct(){
            $this->usuarioRegister = new Register();
        }

        public function functionRegister(){
            require_once "../Views/FormRegister.php";
        }
        public function register(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
            }
            //comprobacion de que no hay nada vacio
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

            if($password != $password2){
                echo "La contraseña no coincide";
                $passwordOk = false;
            }else{
                echo "Las contraseñas coinciden";
                $passwordOk = true;
            }
            //solo si la validacion de la contraseña coincide pasará al siguiente paso
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