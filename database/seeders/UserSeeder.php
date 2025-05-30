<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create admin if doesn't exist
        if (!User::where('email', 'admin@example.com')->exists()) {
            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
            ]);
            $admin->assignRole('admin');
        }

        // Create manager if doesn't exist
        if (!User::where('email', 'manager@example.com')->exists()) {
            $manager = User::create([
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'password' => bcrypt('password'),
            ]);
            $manager->assignRole('manager');
        }

        // Create customer users
        $existingEmails = User::pluck('email')->toArray();
        $createdCustomers = 0;
        $maxAttempts = 20; // Prevent infinite loop
        $attempts = 0;

        while ($createdCustomers < 8 && $attempts < $maxAttempts) {
            $email = $faker->unique()->safeEmail;
            
            if (!in_array($email, $existingEmails)) {
                $user = User::create([
                    'name' => $faker->name,
                    'email' => $email,
                    'password' => bcrypt('password'),
                ]);
                $user->assignRole('customer');
                $existingEmails[] = $email;
                $createdCustomers++;
            }
            
            $attempts++;
        }
    }
}

