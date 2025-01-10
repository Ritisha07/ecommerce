<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand; // Import the Brand model

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::insert([
            ['name' => 'Brand 1', 'description' => 'Description for Brand 1', 'image' => 'brand/brand-img-1.webp'],
            ['name' => 'Brand 2', 'description' => 'Description for Brand 2', 'image' => 'brand/brand-img-2.webp'],
            ['name' => 'Brand 3', 'description' => 'Description for Brand 3', 'image' => 'brand/brand-img-3.webp'],
            ['name' => 'Brand 4', 'description' => 'Description for Brand 4', 'image' => 'brand/brand-img-4.webp'],
            ['name' => 'Brand 5', 'description' => 'Description for Brand 5', 'image' => 'brand/brand-img-5.webp'],
            ['name' => 'Brand 6', 'description' => 'Description for Brand 6', 'image' => 'brand/brand-img-6.webp'],
            ['name' => 'Brand 7', 'description' => 'Description for Brand 7', 'image' => 'brand/brand-img-7.webp'],
            ['name' => 'Brand 8', 'description' => 'Description for Brand 8', 'image' => 'brand/brand-img-8.webp'],
            ['name' => 'Brand 9', 'description' => 'Description for Brand 9', 'image' => 'brand/brand-img-9.webp'],
            ['name' => 'Brand 10', 'description' => 'Description for Brand 10', 'image' => 'brand/brand-img-10.webp'],
            ['name' => 'Brand 11', 'description' => 'Description for Brand 11', 'image' => 'brand/brand-img-11.webp'],
            ['name' => 'Brand 12', 'description' => 'Description for Brand 12', 'image' => 'brand/brand-img-12.webp'],
            
        ]);
    }
}
