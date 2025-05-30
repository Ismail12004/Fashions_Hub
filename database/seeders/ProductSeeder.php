<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        $mensCategory = Category::where('name', 'Men\'s Clothing')->first();
        $womensCategory = Category::where('name', 'Women\'s Clothing')->first();

        if (!$mensCategory || !$womensCategory) {
            return;
        }

        $mensProducts = [
            [
                'name' => 'Classic White Shirt',
                'description' => 'A timeless white cotton shirt perfect for any occasion',
                'price' => 49.99,
                'stock' => 100,
                'image' => 'products/mens/white-shirt.jpg'
            ],
            [
                'name' => 'Black Slim-Fit Suit',
                'description' => 'Modern slim-fit suit in classic black',
                'price' => 299.99,
                'stock' => 50,
                'image' => 'products/mens/black-suit.jpg'
            ],
            [
                'name' => 'Casual Denim Jeans',
                'description' => 'Comfortable and stylish denim jeans for everyday wear',
                'price' => 79.99,
                'stock' => 150,
                'image' => 'products/mens/jeans.jpg'
            ]
        ];

        $womensProducts = [
            [
                'name' => 'Floral Summer Dress',
                'description' => 'Light and elegant floral dress perfect for summer',
                'price' => 89.99,
                'stock' => 75,
                'image' => 'products/womens/summer-dress.jpg'
            ],
            [
                'name' => 'Professional Blazer',
                'description' => 'Sophisticated blazer for the modern professional woman',
                'price' => 129.99,
                'stock' => 60,
                'image' => 'products/womens/blazer.jpg'
            ],
            [
                'name' => 'High-Waisted Skirt',
                'description' => 'Elegant high-waisted skirt for a classic look',
                'price' => 59.99,
                'stock' => 85,
                'image' => 'products/womens/skirt.jpg'
            ]
        ];

        // Create men's products
        foreach ($mensProducts as $product) {
            Product::updateOrCreate(
                [
                    'name' => $product['name'],
                    'category_id' => $mensCategory->id
                ],
                array_merge($product, ['category_id' => $mensCategory->id])
            );
        }

        // Create women's products
        foreach ($womensProducts as $product) {
            Product::updateOrCreate(
                [
                    'name' => $product['name'],
                    'category_id' => $womensCategory->id
                ],
                array_merge($product, ['category_id' => $womensCategory->id])
            );
        }

        // Create some additional random products for each category
        $categories = [$mensCategory, $womensCategory];

        foreach ($categories as $category) {
            for ($i = 0; $i < 5; $i++) {
                Product::create([
                    'name' => ucfirst($faker->words(3, true)),
                    'description' => $faker->paragraph,
                    'price' => $faker->randomFloat(2, 10, 500),
                    'stock' => $faker->numberBetween(0, 200),
                    'category_id' => $category->id,
                    'image' => 'products/placeholder.jpg'
                ]);
            }
        }
    }
}

