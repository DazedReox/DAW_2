<?php

namespace App\Repositories;

use App\Core\Database;
use PDO;

class OrderRepository{

    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    //ver todos los pedidos
    public function getAllOrders(){
        $stmt = $this->db->query("SELECT * FROM orders");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //ver pedido por su id
    public function getOrderById($id){
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //crear un nuevo pedido
    public function createOrder($data){
        $stmt = $this->db->prepare("INSERT INTO orders (user_id, total_price, status, created_at) VALUES (:user_id, :total_price, :status, NOW())");
        return $stmt->execute($data);
    }

    //actualizar pedido
    public function updateOrder($id, $data){
        $data['id'] = $id;
        $stmt = $this->db->prepare("UPDATE orders SET user_id = :user_id, total_price = :total_price, status = :status WHERE id = :id");
        return $stmt->execute($data);
    }

    //eliminar ujn predido
    public function deleteOrder($id){
        $stmt = $this->db->prepare("DELETE FROM orders WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
?>