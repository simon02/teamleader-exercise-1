<?php

namespace TeamleaderExercise1\Service;

use TeamleaderExercise1\Entity\Customer;
use TeamleaderExercise1\Entity\Discount;
use TeamleaderExercise1\Service\ApiService;

class DiscountService {
	
	private $discountCalculators;

	public function __construct() {

	}

	public function calculateDiscounts($order) {

    $discounts = [];

    // discount rule 1
    // A customer who has already bought for over € 1000, gets a discount of 10% on the whole order.
    $customer = ApiService::findCustomerWithId($order->customer_id);
    if ($customer->revenue >= 1000) {
      // discount of 10% on order total
      $discounts[] = new Discount(
        $order->total * .1,
        "10% discount on your total order amount because we love you!"
      );
    }

    // discount rule 2
    // For every products of category "Switches" (id 2), when you buy five, you get a sixth for free.
    foreach($order->items as $item) { 
      if ($this->findCategoryId($item->product_id) === 2 && $item->quantity > 5) {
        // can occur multiple times
        for ($i = 0; $i < floor($item->quantity / 6); $i++) {
          // discount amount == price of this item
          $discounts[] = new Discount(
            $item->unit_price,
            "buy 5, get one for free (product: {$item->product_id})"
          );
        }
      }
    }

    // discount rule 3
    // If you buy two or more products of category "Tools" (id 1), you get a 20% discount on the cheapest product.
    $amount = 0;
    $cheapest = null;
    foreach($order->items as $item) {
      if ($this->findCategoryId($item->product_id) === 1) {
        $amount += $item->quantity;
        if ($cheapest === null || $cheapest->unit_price > $item->unit_price) {
          $cheapest = $item;
        }
      }
    }
    if ($amount >= 2) {
      $discounts[] = new Discount(
        $cheapest->unit_price * .20,
        "buy 2+ tools (category 1), get the cheapest at 20% off (product: {$cheapest->product_id})"
      );
    }

    return $discounts;
	}

  private function findCategoryId($productId) {
    return ApiService::findProductWithId($productId)->category;
  }
}