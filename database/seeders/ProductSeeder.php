<?php

namespace Database\Seeders;

// use App\Models\Category;
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
        'name' => 'Snickers',
        'description' => 'A chocolate bar with caramel, nougat, and peanuts.',
        'price' => 30,
      ],
      [
        'name' => 'Coca-Cola',
        'description' => ' A refreshing carbonated soft drink.',
        'price' => 15,
      ],
      [
        'name' => 'KitKat',
        'description' => 'A crispy wafer covered in chocolate.',
        'price' => 19,
      ],
      [
        'name' => 'Pepsi',
        'description' => 'A popular cola-flavored soft drink.',
        'price' => 12,
      ],
      [
        'name' => 'Doritos',
        'description' => 'Crunchy tortilla chips with bold flavors.',
        'price' => 20,

      ],
    ];
    foreach( $products as $product){
      Product::create($product);
    }
  }
}
