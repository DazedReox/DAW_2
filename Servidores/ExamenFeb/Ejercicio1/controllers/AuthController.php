<?php
require_once 'config/database.php';
require_once 'libs/EmailSender.php';

class AuthController {
    
    public $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    //registro de usuarios
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $correo = $_POST['correo'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); //encriptar contraseña
            $aseguradora = $_POST['aseguradora'] ?? NULL;
            $token = bin2hex(random_bytes(50)); //token confirmacion

            $sql = "INSERT INTO pacientes (nombre, apellidos, telefono, dni, correo, password, aseguradora, token_confirmacion, estado_confirmacion) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 0)";
            
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                die("Error en la preparación de la consulta: " . $this->conn->error);
            }

            $stmt->bind_param("ssssssss", $nombre, $apellidos, $telefono, $dni, $correo, $password, $aseguradora, $token);

            if ($stmt->execute()) {
                //correo confirmacion
                $emailSender = new EmailSender();
                $emailSender->sendConfirmationEmail($correo, $token);

                echo "Registro exitoso. Revisa tu correo para confirmar tu cuenta.";
            } else {
                echo "Error en el registro: " . $this->conn->error;
            }

            $stmt->close();
        }
    }

    //email check
    public function confirmEmail() {
        if (isset($_GET['token'])) {
            $token = $_GET['token'];

            $sql = "SELECT id FROM pacientes WHERE token_confirmacion = ? AND estado_confirmacion = 0";
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                die("Error en la preparación de la consulta: " . $this->conn->error);
            }

            $stmt->bind_param("s", $token);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id);
                $stmt->fetch();

                $updateSQL = "UPDATE pacientes SET estado_confirmacion = 1, token_confirmacion = NULL WHERE id = ?";
                $updateStmt = $this->conn->prepare($updateSQL);
                
                if (!$updateStmt) {
                    die("Error en la preparacion de la consulta: " . $this->conn->error);
                }

                $updateStmt->bind_param("i", $id);
                $updateStmt->execute();

                echo "Cuenta confirmada con exito. Ya puedes iniciar sesion.";
                $updateStmt->close();
            } else {
                echo "El token no es valido";
            }

            $stmt->close();
        }
    }

    //login
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = $_POST['correo'];
            $password = $_POST['password'];

            $sql = "SELECT id, password, estado_confirmacion FROM pacientes WHERE correo = ?";
            $stmt = $this->conn->prepare($sql);

            if (!$stmt) {
                die("Error en la preparación de la consulta: " . $this->conn->error);
            }

            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $hashed_password, $estado_confirmacion);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    session_start();
                    $_SESSION['user_id'] = $id;
                    $_SESSION['correo'] = $correo;
                    echo "Inicio de sesión exitoso.";
                } else {
                    echo "Contraseña incorrecta.";
                }
            } else {
                echo "Correo no registrado.";
            }

            $stmt->close();
        }
    }

    //logout
    public function logout() {
        session_start();
        session_destroy();
        echo "Sesión cerrada exitosamente.";
    }
}
?>
