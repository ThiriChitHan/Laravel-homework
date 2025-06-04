<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Snickers',
                'description' => 'A chocolate bar with caramel, nougat, and peanuts.',
                'price' => 1000,
            ],
            [
                'category_id' => 2,
                'name' => 'Coca-Cola',
                'description' => 'A refreshing carbonated soft drink.',
                'price' => 800,
            ],
            [
                'category_id' => 3,
                'name' => 'KitKat',
                'description' => 'A crispy wafer covered in chocolates.',
                'price' => 200,
            ],
            [
                'category_id' => 4,
                'name' => 'Pepsi',
                'description' => 'A popular cola-flavored soft drink.',
                'price' => 400,
            ],
            [
                'category_id' => 5,
                'name' => 'Doritos',
                'description' => 'Crunchy tortilla chips with bold flavors.',
                'price' => 600,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }


    }
}
