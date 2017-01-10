<?php

namespace TeamleaderExercise1\Entity;

use \TeamleaderExercise1\Entity\LineItem;

class Order {
  
  public $id;
  public $customer_id;
  public $items;
  public $total;

  public function __construct($id, $customer_id, $items, $total) {
    $this->id = intval($id);
    $this->customer_id = intval($customer_id);
    $this->items = $items;
    $this->total = floatval($total);
  }

  public static function instance_from_json($order) {
    return new Order($order['id'],
      $order['customer-id'],
      array_map(function($item) {
        return new LineItem($item['product-id'], $item['quantity'], $item['unit-price'], $item['total']);
      }, $order['items']),
      $order['total']
    );
  }

}