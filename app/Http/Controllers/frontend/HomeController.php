<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();  // Fetch all categories from the database
        $brands = Brand::all();  // Fetch all brands from the database
        $products = Product::all();  // Fetch all products from the database
        $flashSaleProducts = Product::where('featured_product', true)->get();
        $topSellingProducts = Product::where('top_selling', true)->get();
        $sellerOfTheWeekProducts = Product::where('seller_of_the_week', true)->get();
        //$sellerOfTheWeekProducts = Product::where('top_selling', true)->get();
        $flashSale = Product::where('flash_sale', true)->get(); 
        return view('frontend.index', compact('categories', 'brands', 'products','flashSaleProducts',
        'topSellingProducts','sellerOfTheWeekProducts','flashSale'));  // Pass categories, brands, and products to the view
    }
    
}
