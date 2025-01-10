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
        ]);
    }
}
