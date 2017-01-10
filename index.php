<?php
/**
 * @author Simon Buelens
 * @created 09.01.2016
 */

require 'vendor/autoload.php';

use \TeamleaderExercise1\Entity\Order;
use \TeamleaderExercise1\Service\DiscountService;
use \TeamleaderExercise1\Service\ApiService;

$f3 = Base::instance();

// everything will be returned in json
header("Content-Type: application/json", true);

/**
 * Routes
 */

// Home

$f3->route('POST /calculate_discounts',
  function($f3) { 
    $order_temp = json_decode($f3->BODY, true);
    $order = Order::instance_from_json($order_temp);

    $discountService = new DiscountService();
    $discounts = $discountService->calculateDiscounts($order);
    echo array_map(function($d) { return $d->amount; }, $discounts);
    $total = array_sum(array_map(function($d) { return $d->amount; }, $discounts));
    echo json_encode(["discounts" => $discounts, "total_discount" => $total, "count" => count($discounts)]);
    
  }
);


// Gets Untranslated Terms for a specific Locale

/**
 * Run F3 Application
 */
$f3->run();