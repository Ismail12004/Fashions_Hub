<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CartItem;
use App\Models\Cart;
use App\Models\Product;
use Faker\Factory as Faker;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $cartIds = Cart::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        if (empty($cartIds) || empty($productIds)) {
            $this->command->warn("تأكد أن جداول carts و products تحتوي على بيانات.");
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            CartItem::create([
                'cart_id'    => $faker->randomElement($cartIds),
                'product_id' => $faker->randomElement($productIds),
                'quantity'   => $faker->numberBetween(1, 5),
                'added_at'   => $faker->dateTimeThisMonth(),
            ]);
        }
    }
}

