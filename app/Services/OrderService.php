<?php

namespace App\Services;

use Exception;
use App\Models\Order;
use App\Services\ProductService;
use App\Services\ProspectService;


class OrderService
{
  static function storeOrder($prospect, $data)
  {
    $order = Order::create([
      'customer_id' => $prospect->id,
      'customer_name' =>  $prospect->email,
      'customer_email' => $prospect->email
    ]);

    $selectedProducts = $data['selected_products'];

    foreach ($selectedProducts as $product) {
      $product_obj = ProductService::getProductById($product);
      if ($product_obj) {
        $order->products()->attach($product);
      } else {
        throw new Exception('not_exist ' . $product);
      }
    }
    $prospect->update(['state_id' => 3]);
    return $order;

  }

  static function getAllOrders()
  {
    $orders = Order::latest()->filter()->paginate(10);
    return $orders;
  }
  static function findOrder($id)
  {
    $order = Order::find($id);
    if(!$order)
    {
      abort(404);
    }
    return $order;
  }
}
