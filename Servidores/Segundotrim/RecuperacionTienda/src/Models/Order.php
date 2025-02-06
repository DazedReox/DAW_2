<?php

namespace App\Models;

class Order{

    private $id;
    private $userId;
    private $totalPrice;
    private $status;
    private $createdAt;

    public function __construct($userId, $totalPrice, $status = 'pending'){
        $this->userId = $userId;
        $this->totalPrice = $totalPrice;
        $this->status = $status;
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getId(){
        return $this->id;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function getTotalPrice(){
        return $this->totalPrice;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getCreatedAt(){
        return $this->createdAt;
    }
}
?>