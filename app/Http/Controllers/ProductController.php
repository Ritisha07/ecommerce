<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\category;

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
    $category = Category::findOrFail($product->category_id); 
    return view('frontend.product-info', compact('product','sellerOfTheWeekProducts','category')); // Pass the product variable to the view

    
}
public function filterProducts(Request $request)
    {
        $query = Product::query();

        // Filter by selected categories
        if ($request->has('categories') && !empty($request->categories)) {
            $query->whereIn('category_id', $request->categories);
        }

        // Filter by selected brands
        if ($request->has('brands') && !empty($request->brands)) {
            $query->whereIn('brand_id', $request->brands);
        }

        // Filter by price range
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        // Get the filtered products
        $products = $query->get();

        return response()->json(['products' => $products]);
    }

}
