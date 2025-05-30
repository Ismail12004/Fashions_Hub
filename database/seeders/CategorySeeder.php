<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Men\'s Clothing',
                'description' => 'Stylish and comfortable clothing for men including shirts, pants, suits, and accessories.'
            ],
            [
                'name' => 'Women\'s Clothing',
                'description' => 'Trendy and fashionable clothing for women including dresses, tops, skirts, and accessories.'
            ]
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['name' => $category['name']],
                $category
            );
        }
    }
}
