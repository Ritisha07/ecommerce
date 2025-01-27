<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display products on the index page
    public function index()
    {
        // Fetch top-selling products
        $topSellingProducts = Product::where('top_selling', true)->get();

        // Fetch seller of the week products
        $sellerOfTheWeekProducts = Product::where('seller_of_the_week', true)->get();
        
        $flashSale = Product::where('flash_sale', true)->get();

        // Fetch flash sale products
        $flashSaleProducts = Product::where('featured_product', true)
            ->where('sale_start_time', '<=', now())
            ->where('sale_end_time', '>=', now())
            ->get();

        // Fetch all products
        $products = Product::all();

        // Pass data to the frontend.index view
        return view('frontend.index', compact(
            'topSellingProducts',
            'sellerOfTheWeekProducts',
            'flashSaleProducts',
            'products'
        ));
    }

    // Show details of a single product
    // Show details of a single product
public function show($id)
{
    
    $product = Product::findOrFail($id); // This will return a single product or throw 404 if not found
    $sellerOfTheWeekProducts = Product::where('seller_of_the_week', true)->get();
    return view('frontend.product-info', compact('product','sellerOfTheWeekProducts')); // Pass the product variable to the view
}

}
