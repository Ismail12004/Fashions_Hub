<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        // Get all customers
        $customers = User::role('customer')->get();
        
        foreach ($customers as $customer) {
            // Create 1-3 orders for each customer
            $numOrders = rand(1, 3);
            
            for ($i = 0; $i < $numOrders; $i++) {
                Order::create([
                    'user_id' => $customer->id,
                    'total_amount' => $faker->randomFloat(2, 50, 500),
                    'status' => $faker->randomElement(['pending', 'processing', 'completed', 'cancelled']),
                    'shipping_address' => $faker->address,
                    'payment_status' => $faker->randomElement(['pending', 'paid', 'failed'])
                ]);
            }
        }
    }
}
