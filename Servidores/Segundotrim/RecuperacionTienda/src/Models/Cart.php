<?php

namespace App\Models;

class Cart{
    
    private $items = [];

    //añadir prod
    public function addProduct($productId, $quantity){
        if (isset($this->items[$productId])) {
            $this->items[$productId] += $quantity;
        } else {
            $this->items[$productId] = $quantity;
        }
    }

    //delete un producto
    public function removeProduct($productId){
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    //prod carrito
    public function getItems(){
        return $this->items;
    }

    //vaciar carro
    public function clearCart(){
        $this->items = [];
    }

    //total prod en carrito
    public function getTotalQuantity(){
        return array_sum($this->items);
    }
}
?>