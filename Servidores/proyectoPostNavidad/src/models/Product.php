<?php
namespace Models;

class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha_creacion;
    private $imagen;
    private $categoria_id;

    public function __construct($data = []) {
        $this->id = $data['id'] ?? null;
        $this->nombre = $data['nombre'] ?? '';
        $this->descripcion = $data['descripcion'] ?? '';
        $this->precio = $data['precio'] ?? 0.0;
        $this->stock = $data['stock'] ?? 0;
        $this->oferta = $data['oferta'] ?? false;
        $this->fecha_creacion = $data['fecha_creacion'] ?? date('Y-m-d H:i:s');
        $this->imagen = $data['imagen'] ?? '';
        $this->categoria_id = $data['categoria_id'] ?? null;
    }

    // Getters y setters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getDescripcion() { return $this->descripcion; }
    public function getPrecio() { return $this->precio; }
    public function getStock() { return $this->stock; }
    public function getOferta() { return $this->oferta; }
    public function getFechaCreacion() { return $this->fecha_creacion; }
    public function getImagen() { return $this->imagen; }
    public function getCategoriaId() { return $this->categoria_id; }

    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setPrecio($precio) { $this->precio = $precio; }
    public function setStock($stock) { $this->stock = $stock; }
    public function setOferta($oferta) { $this->oferta = $oferta; }
    public function setFechaCreacion($fecha) { $this->fecha_creacion = $fecha; }
    public function setImagen($imagen) { $this->imagen = $imagen; }
    public function setCategoriaId($categoria_id) { $this->categoria_id = $categoria_id; }
}
?>