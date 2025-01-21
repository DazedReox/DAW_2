<?php
namespace Models;

class Usuario {
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;

    public function __construct($data = []) {
        $this->id = $data['id'];
        $this->nombre = $data['nombre'];
        $this->apellidos = $data['apellidos'];
        $this->email = $data['email'];
        $this->password = $data['password'];
        $this->rol = $data['rol'] ?? 'cliente';
    }

    // Getters y setters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getApellidos() { return $this->apellidos; }
    public function getEmail() { return $this->email; }
    public function getPassword() { return $this->password; }
    public function getRol() { return $this->rol; }

    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setApellidos($apellidos) { $this->apellidos = $apellidos; }
    public function setEmail($email) { $this->email = $email; }
    public function setPassword($password) { $this->password = password_hash($password, PASSWORD_DEFAULT); }
    public function setRol($rol) { $this->rol = $rol; }
}
?>