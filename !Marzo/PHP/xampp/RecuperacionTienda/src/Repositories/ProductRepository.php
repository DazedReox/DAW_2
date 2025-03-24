<?php

namespace App\Repositories;

use App\Core\Database;
use PDO;

class ProductRepository{

    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    //ver todos los prod
    public function getAllProducts(){
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //ver prod por su id
    public function getProductById($id){
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //crear prod
    public function createProduct($data){
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, stock, category_id) VALUES (:name, :description, :price, :stock, :category_id)");
        return $stmt->execute($data);
    }

    //updatear prd
    public function updateProduct($id, $data){
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE products SET name = :name, description = :description, price = :price, stock = :stock, category_id = :category_id WHERE id = :id");
        return $stmt->execute($data);
    }

    //borrar un prodcuto
    public function deleteProduct($id){
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>