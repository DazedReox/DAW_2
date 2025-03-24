<?php

namespace App\Models;

class Product{
    
    private $id;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $categoryId;

    public function __construct($name, $description, $price, $stock, $categoryId){
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->stock = $stock;
        $this->categoryId = $categoryId;
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getStock(){
        return $this->stock;
    }

    public function getCategoryId(){
        return $this->categoryId;
    }

    public function setStock($stock){
        $this->stock = $stock;
    }
}
?>