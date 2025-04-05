<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                Product::create([
                    'name' => $category->name . ' Item ' . $i,
                    'price' => rand(10000, 100000),
                    'stock' => rand(5, 20),
                    'category_id' => $category->id,
                    'image_path' => null,
                ]);
            }
        }
    }
}
