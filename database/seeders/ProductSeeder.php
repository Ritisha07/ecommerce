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
                
                'category_id' => 1,
                'brand_id' => Brand::first()->id, // Using first brand as an example
                'seller_name' => 'Seller 1',
                'status' => 'active',
                'image' => 'product/bag.jpg',
                'model_no' => 'MODEL001',
                'manufacture' => '2025-01-01',
                'expiry_date' => '2026-01-01',
                'modify_date' => '2025-01-01',
                'tax_type' => 'NonTaxable',
                'featured_product' => true,// for top flash sale
                'discount_type' => 'percentage',
                'discount_value' => 10,
                'rating' => 4.5, //rating
                'top_selling' => true,  // Add top selling flag
                'seller_of_the_week' => true, // Add seller of the week flag for "best sell in this week"
                'flash_sale' => true, // Add flash sale flag for "lower flash sale"
                'sale_start_time' => '2025-01-10 00:00:00',
                'sale_end_time' => '2025-01-15 23:59:59',
            ],
            [
                'name' => 'Shoes',
                'sku' => 'PROD2',
                'slug' => 'product-2',
                'regular_price' => 200.00,
                'sale_price' => 180.00,
                'mrp' => 220.00,
                'description' => 'This is confortable black shoes for men',
                'category_id' => 11,
                'brand_id' => Brand::skip(1)->first()->id, // Using second brand as an example
                'seller_name' => 'Seller 2',
                'status' => 'inactive',
                'image' => 'product/shoes.jpg',
                'model_no' => 'MODEL002',
                'manufacture' => '2025-02-01',
                'expiry_date' => '2026-02-01',
                'modify_date' => '2025-02-01',
                'tax_type' => 'taxable',
                'featured_product' => false,//top flash sale
                'discount_type' => 'fixed',
                'discount_value' => 20,
                'rating' => 3.5,
                // 'new_arrival'=>true,
                'top_selling' => true,  // Add top selling flag
                'seller_of_the_week' => true, // Add seller of the week flag
                'flash_sale' => true, // Add flash sale flag
                'sale_start_time' => '2025-01-10 00:00:00',
                'sale_end_time' => '2025-01-15 23:59:59',
            ],
            [
                'name' => 'Dress',
                'sku' => 'PROD3',
                'slug' => 'product-3',
                'regular_price' => 1900.00,
                'sale_price' => 1800.00,
                'mrp' => 1850.00,
                'description' => 'This is a beaytiful red dress',
                'category_id' => 5,
                'brand_id' => Brand::skip(1)->first()->id, // Using second brand as an example
                'seller_name' => 'Seller 3',
                'status' => 'inactive',
                'image' => 'product/dress.jpg',
                'model_no' => 'MODEL002',
                'manufacture' => '2025-08-09',
                'expiry_date' => '2026-06-01',
                'modify_date' => '2025-02-01',
                'tax_type' => 'taxable',
                'featured_product' => false,
                'discount_type' => 'fixed',
                'discount_value' => 20,
                'rating' => 4.5,
                // 'new_arrival'=>true,
                'top_selling' => true,  // Add top selling flag
                'seller_of_the_week' => true, // Add seller of the week flag
                'flash_sale' => false, // Add flash sale flag
                'sale_start_time' => '2025-01-10 00:00:00',
                'sale_end_time' => '2025-01-15 23:59:59',
            ],[
                'name' => 'Watch',
                'sku' => 'PROD4',
                'slug' => 'product-4',
                'regular_price' => 2000.00,
                'sale_price' => 1800.00,
                'mrp' => 2200.00,
                'description' => 'This is stylist black watch for men',
                'category_id' => 8,
                'brand_id' => Brand::skip(1)->first()->id, // Using second brand as an example
                'seller_name' => 'Seller 4',
                'status' => 'inactive',
                'image' => 'product/watch.jpg',
                'model_no' => 'MODEL004',
                'manufacture' => '2025-12-11',
                'expiry_date' => '2026-02-26',
                'modify_date' => '2025-9-01',
                'tax_type' => 'taxable',
                'featured_product' => true,
                'discount_type' => 'fixed',
                'discount_value' => 20,
                'rating' => 2.5,
                // 'new_arrival'=>true,
                'top_selling' => false,  // Add top selling flag
                'seller_of_the_week' => true, // Add seller of the week flag
                'flash_sale' => true, // Add flash sale flag
                'sale_start_time' => '2025-01-10 00:00:00',
                'sale_end_time' => '2025-01-15 23:59:59',
            ],
            [
                'name' => 'Smart Watch',
                'sku' => 'PROD44',
                'slug' => 'product-5',
                'regular_price' => 3000.00,
                'sale_price' => 2800.00,
                'mrp' => 2200.00,
                'description' => 'This is stylist black snart watch for men',
                'category_id' => 8,
                'brand_id' => Brand::skip(1)->first()->id, // Using second brand as an example
                'seller_name' => 'Seller 4',
                'status' => 'inactive',
                'image' => 'product/watch2.jpg',
                'model_no' => 'MODEL004',
                'manufacture' => '2025-12-11',
                'expiry_date' => '2026-02-26',
                'modify_date' => '2025-9-01',
                'tax_type' => 'taxable',
                'featured_product' => true,
                'discount_type' => 'fixed',
                'discount_value' => 20,
                'rating' => 2.5,
                // 'new_arrival'=>true,
                'top_selling' => false,  // Add top selling flag
                'seller_of_the_week' => true, // Add seller of the week flag
                'flash_sale' => true, // Add flash sale flag
                'sale_start_time' => '2025-01-10 00:00:00',
                'sale_end_time' => '2025-01-15 23:59:59',
            ],
            [
                'name' => 'glasses',
                'sku' => 'PROD5',
                'slug' => 'product-5',
                'regular_price' => 1500.00,
                'sale_price' => 1400.00,
                'mrp' => 1550.00,
                'description' => 'This is stylist glasses',
                'category_id' => 9,
                'brand_id' => Brand::skip(1)->first()->id, // Using second brand as an example
                'seller_name' => 'Seller 2',
                'status' => 'inactive',
                'image' => 'product/glasses.jpg',
                'model_no' => 'MODEL005',
                'manufacture' => '2025-02-01',
                'expiry_date' => '2026-02-01',
                'modify_date' => '2025-02-01',
                'tax_type' => 'taxable',
                'featured_product' => true,
                'discount_type' => 'fixed',
                'discount_value' => 20,
                'rating' => 2.5,
                // 'new_arrival'=>true,
                'top_selling' => false,  // Add top selling flag
                'seller_of_the_week' => false, // Add seller of the week flag
                'flash_sale' => false,// Add flash sale flag
                'sale_start_time' => '2025-01-10 00:00:00',
                'sale_end_time' => '2025-01-15 23:59:59',
            ],
            [
                'name' => 'sweater',
                'sku' => 'PROD6',
                'slug' => 'product-6',
                'regular_price' => 1200.00,
                'sale_price' => 100.00,
                'mrp' => 1250.00,
                'description' => 'This is stylist sweater',
                'category_id' => 7, 
                'brand_id' => Brand::skip(1)->first()->id,
                'seller_name' => 'Seller 6',
                'status' => 'active',
                'image' => 'product/sweater.jpg',
                'model_no' => 'MODEL005',
                'manufacture' => '2025-02-01',
                'expiry_date' => '2026-02-01',
                'modify_date' => '2025-02-01',
                'tax_type' => 'taxable',
                'featured_product' => false,// top flash sale
                'discount_type' => 'fixed',
                'discount_value' => 20,
                'rating' => 5.5,
                // 'new_arrival'=>true,
                'top_selling' => true,  // Add top selling flag
                'seller_of_the_week' => false, // Add seller of the week flag
                'flash_sale' => true,// Add flash sale flag
                'sale_start_time' => '2025-01-10 00:00:00',
                'sale_end_time' => '2025-01-15 23:59:59',
            ],
            
        ];

        // Insert products into the database
        foreach ($products as $product) {
            
            Product::create($product);
        }
    }
}
