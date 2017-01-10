<?php

namespace TeamleaderExercise1\Entity;

class LineItem {
  
  public $product_id;
  public $quantity;
  public $unit_price;
  public $total;

  public function __construct($product_id, $quantity, $unit_price, $total) {
    $this->product_id = $product_id;
    $this->quantity = intval($quantity);
    $this->unit_price = floatval($unit_price);
    $this->total = floatval($total);
  }

}