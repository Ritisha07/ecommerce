<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample product data
        $products = [
            [
                'name' => 'Bag',
                'sku' => 'PROD1',
                'slug' => 'product-1',
                'regular_price' => 100.00,
                'sale_price' => 90.00,
                'mrp' => 110.00,
                'description' => 'This is stylist black bags for women',
                'category_id' => Category::first()->id, // Using first category as an example
                'brand_id' => Brand::first()->id, // Using first brand as an example
                'seller_name' => 'Seller 1',
                'status' => 'active',
                'image' => 'product/bag.jpg',
                'model_no' => 'MODEL001',
                'manufacture' => '2025-01-01',
                'expiry_date' => '2026-01-01',
                'modify_date' => '2025-01-01',
                'tax_type' => 'NonTaxable',
                'featured_product' => true,
                'discount_type' => 'percentage',
                'discount_value' => 10,
                'rating' => 4.5,
            ],
            [
                'name' => 'Shoes',
                'sku' => 'PROD2',
                'slug' => 'product-2',
                'regular_price' => 200.00,
                'sale_price' => 180.00,
                'mrp' => 220.00,
                'description' => 'This is confortable black shoes for men',
                'category_id' => Category::skip(1)->first()->id, // Using second category as an example
                'brand_id' => Brand::skip(1)->first()->id, // Using second brand as an example
                'seller_name' => 'Seller 2',
                'status' => 'inactive',
                'image' => 'product/shoes.jpg',
                'model_no' => 'MODEL002',
                'manufacture' => '2025-02-01',
                'expiry_date' => '2026-02-01',
                'modify_date' => '2025-02-01',
                'tax_type' => 'taxable',
                'featured_product' => false,
                'discount_type' => 'fixed',
                'discount_value' => 20,
                'rating' => 3.5
            ],
            // Add more products here
        ];

        // Insert products into the database
        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
