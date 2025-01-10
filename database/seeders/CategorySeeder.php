<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define categories with both 'name' and 'image' fields
        $categories = [
            ['name' => 'Bag', 'image' => 'category/bags.webp'],
            ['name' => 'baby', 'image' => 'category/baby.webp'],
            ['name' => 'cap', 'image' => 'category/cap.webp'],
            ['name' => 'gift', 'image' => 'category/gift.webp'],
            ['name' => 'dresses', 'image' => 'category/dresses.webp'],
            ['name' => 'sneakers', 'image' => 'category/sneakers.webp'],
            ['name' => 'sweaters', 'image' => 'category/sweaters.webp'],
            ['name' => 'watch', 'image' => 'category/watch.webp'],
            ['name' => 'glass', 'image' => 'category/glass.webp'],
            ['name' => 'ring', 'image' => 'category/ring.webp'],
            ['name' => 'shoes', 'image' => 'category/shoes.webp'],
        ];

        // Insert categories into the database
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
