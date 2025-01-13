<?php
class User {
    protected static array $errores = [];
    private $db;

    public function __construct() {
        $this->db = $this->connect();
    }
    
    private function connect() {
        try {
            $dsn = 'mysql:host=localhost;dbname=tu_base_datos';
            $username = 'tu_usuario';
            $password = 'tu_contrase\u00f1a';
            return new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            error_log("Error de conexión: " . $e->getMessage());
            throw new Exception("Error al conectar con la base de datos");
        }
    }

    public static function getErrores(): array {
        return self::$errores;
    }

    public static function setErrores(array $errores): void {
        self::$errores = $errores;
    }

    public function create(Usuario $usuario): bool {
        try {
            $query = "INSERT INTO usuarios (nombre, apellidos, email, password, rol) 
                      VALUES (:nombre, :apellidos, :email, :password, :rol)";
            $ins = $this->db->prepare($query);

            $ins->bindValue(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
            $ins->bindValue(':apellidos', $usuario->getApellidos(), PDO::PARAM_STR);
            $ins->bindValue(':email', $usuario->getEmail(), PDO::PARAM_STR);
            $ins->bindValue(':password', $usuario->getPassword(), PDO::PARAM_STR);
            $ins->bindValue(':rol', $usuario->getRol(), PDO::PARAM_INT);

            $ins->execute();
            return true;
        } catch (PDOException $err) {
            error_log("Error al crear el usuario: " . $err->getMessage());
            return false;
        }
    }
}

class Usuario {
    private string $nombre;
    private string $apellidos;
    private string $email;
    private string $password;
    private int $rol;

    public function __construct(string $nombre, string $apellidos, string $email, string $password, int $rol) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->email = $email;
        $this->password = $password;
        $this->rol = $rol;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidos(): string {
        return $this->apellidos;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getRol(): int {
        return $this->rol;
    }
}
?>
