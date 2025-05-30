<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cart;
use App\Models\User;
use App\Models\Customer;
use Faker\Factory as Faker;

class CartSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // تأكد من وجود مستخدمين وعملاء في القاعدة
        $userIds = User::pluck('id')->toArray();
    

        if (empty($userIds)) {
            $this->command->warn("يجب إنشاء مستخدمين (users) وعملاء (customers) قبل تشغيل CartSeeder.");
            return;
        }

        // إنشاء 10 عربات تسوق
        for ($i = 0; $i < 10; $i++) {
            Cart::create([
                'user_id' => $faker->randomElement($userIds),
               
            ]);
        }
    }
}

