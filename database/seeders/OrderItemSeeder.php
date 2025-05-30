<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Faker\Factory as Faker;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $orders = Order::all();
        $products = Product::all();

        if ($orders->count() === 0 || $products->count() === 0) {
            $this->command->info('Orders and products must exist in the database first.');
            return;
        }

        foreach ($orders as $order) {
            // Add 1-5 items to each order
            $numItems = rand(1, 5);
            $totalAmount = 0;

            for ($i = 0; $i < $numItems; $i++) {
                $product = $products->random();
                $quantity = rand(1, 3);
                $unit_price = $product->price;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $unit_price
                ]);

                $totalAmount += ($unit_price * $quantity);
            }

            // Update order total
            $order->update(['total_amount' => $totalAmount]);
        }
    }
}

