<?php

namespace TeamleaderExercise1\Entity;

class Customer {
  
  public $revenue;
  public $id;

  public function __construct($id, $revenue) {
    $this->id = $id;
    $this->revenue = $revenue;
  }

  public function to_json() {
    return [
      'id' => $this->id,
      'revenue' => $this->revenue
    ];
  }

}