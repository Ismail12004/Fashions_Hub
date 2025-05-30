<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bookmark;
use App\Models\User;
use App\Models\Product;
use Faker\Factory as Faker;

class BookmarkSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        $userIds = User::pluck('id')->toArray();
        $productIds = Product::pluck('id')->toArray();

        if (empty($userIds) || empty($productIds)) {
            $this->command->warn("تأكد أن جداول users و products تحتوي على بيانات.");
            return;
        }

        for ($i = 0; $i < 20; $i++) {
            Bookmark::create([
                'user_id'    => $faker->randomElement($userIds),
                'product_id' => $faker->randomElement($productIds),
                'added_at'   => $faker->dateTimeThisMonth(),
            ]);
        }
    }
}
