<?php

namespace TeamleaderExercise1\Entity;

class Discount {
  
  public $amount;
  public $description;

  public function __construct($amount, $description) {
    $this->amount = $amount;
    $this->description = $description;
  }

}