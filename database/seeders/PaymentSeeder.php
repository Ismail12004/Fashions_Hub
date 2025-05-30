<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        // Get all orders that are not cancelled
        $orders = Order::where('status', '!=', 'cancelled')->get();

        foreach ($orders as $order) {
            // Only create payment for orders with 'paid' payment status
            if ($order->payment_status === 'paid') {
                Payment::create([
                    'order_id' => $order->id,
                    'amount' => $order->total_amount,
                    'payment_method' => $faker->randomElement(['credit_card', 'debit_card', 'paypal']),
                    'transaction_id' => $faker->uuid,
                    'status' => 'completed',
                    'paid_at' => $faker->dateTimeBetween('-1 month', 'now')
                ]);
            }
        }
    }
} 