<?php

namespace TeamleaderExercise1\Service;

use TeamleaderExercise1\Entity\Customer;
use TeamleaderExercise1\Entity\Product;

class ApiService {

  private static function getCustomers() {
    return array_map(
      function($customer) {
        return new Customer(
          $customer['id'],
          $customer['revenue']
        );
      },
      json_decode(file_get_contents('./customers.json'), true)
    );
  }

  public static function getCustomerMapping() {
    $array = [];
    foreach(self::getCustomers() as $customer) {
      $array[$customer->id] = $customer;
    }
    return $array;
  }

  public static function findCustomerWithId($id) {
    return self::getCustomerMapping()[$id];
  }

  private static function getProducts() {
    return array_map(
      function($product) {
        return new Product(
          $product['id'],
          $product['description'],
          $product['category'],
          $product['price']
        );
      },
      json_decode(file_get_contents('./products.json'), true)
    );
  }

  public static function getProductMapping() {
    $array = [];
    foreach(self::getProducts() as $product) {
      $array[$product->id] = $product;
    }
    return $array;
  }

  public static function findProductWithId($id) {
    return self::getProductMapping()[$id];
  }

}