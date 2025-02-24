<?php
class Database {
    private static $host = "localhost"; 
    private static $dbname = "clinica"; 
    private static $username = "root"; 
    private static $password = "";
    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) {
            self::$conn = new mysqli(self::$host, self::$username, self::$password, self::$dbname);

            if (self::$conn->connect_error) {
                die("Error de conexión: " . self::$conn->connect_error);
            }

            self::$conn->set_charset("utf8mb4");
        }

        return self::$conn;
    }

    public static function closeConnection() {
        if (self::$conn !== null) {
            self::$conn->close();
            self::$conn = null;
        }
    }
}
?>
