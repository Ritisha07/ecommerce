<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // Seed users
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Call other seeders
        $this->call([
            CategorySeeder::class,  // Seed categories
            BrandSeeder::class,     // Seed brands
            ProductSeeder::class,   // Seed products
        ]);
    }
}
