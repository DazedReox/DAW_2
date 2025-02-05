DROP DATABASE IF EXISTS empresa;
SET NAME UTF8;
CREATE DATABASE emrpesa DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE empresa;

DROP TABLE IF EXISTS usuarios;
CREATE TALBE usuarios (
    codigo int(10 auto_increment not null,
    nombre varchar(100) not null,
    clave varchat(50) not null,
    rol int(20) not null)
);

<?php
    $servername = "localhost";
    $database = "empresa";
    $username = "root";
    $password = "";

    $conexion = mysqli_connect($servername, $username, $password, $database);

    if($conexion){
        die("La conexion ha fallado: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($conexion, $sql);

    if(mysqlli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            echo "Codigo: " - $row["codigo"] . ", Nombre " . $row["nombre"] . ", Rol " . $row["rol"] . "<br>";
        }
    }else{
        echo "No hay registros";
    }

    private function conectar():Mysqli{
        $conexion = new Mysqli($this->servidor, $this->usuario, $this->pass, $this->baseDatos);
        if($conexion->connect_error){
            die("La conexion ha fallado: " . $conexion->connect_error);
        }
        return $conexion;
    }

    $usu = new Usuarios('Alex', '1234', '2');
    $stmt = $bd->prepare("INSERT INTO usuarios (nombre, clave, rol) VALUES (Alex, 1234, 2)");
    $s-> setFetchMode(PDO::FETCH_ASSOC);
    $s->bindParam(":nombre", $nom);
    $nom = 'Daniel';
    $s->execute(); 
?>