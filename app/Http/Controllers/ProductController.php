<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\category;
use App\Models\Brand;


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
//     public function search(Request $request)
// {
//     $query = $request->input('query');

//     // Search for products based on name or category
//     $products = Product::where('name', 'LIKE', "%$query%")
//         ->orWhereHas('category', function ($q) use ($query) {
//             $q->where('name', 'LIKE', "%$query%");
//         })
//         ->get();

//     // Fetch flash sale products (no price needed)
//     $flashSaleProducts = Product::where('flash_sale', true)
//         ->where('sale_start_time', '<=', now())
//         ->where('sale_end_time', '>=', now())
//         ->get();

//     // Fetch categories and brands
//     $categories = Category::all();
//     $brands = Brand::all();

//     // Fetch other product collections (optional)
//     $topSellingProducts = Product::where('top_selling', true)->get();
//     $sellerOfTheWeekProducts = Product::where('seller_of_the_week', true)->get();

//     return view('frontend.index', compact(
//         'products', 
//         'topSellingProducts', 
//         'sellerOfTheWeekProducts',
//         'flashSaleProducts', // Pass flash sale products
//         'categories', 
//         'brands' // Brands for filtering (if applicable)
//     ));
// }

// public function search(Request $request)
// {
//     $query = $request->input('query');

//     // Search for product by name, category, or brand
//     $product = Product::where('name', 'LIKE', "%$query%")
//         ->orWhereHas('category', function ($q) use ($query) {
//             $q->where('name', 'LIKE', "%$query%");
//         })
//         ->orWhereHas('brand', function ($q) use ($query) {
//             $q->where('name', 'LIKE', "%$query%");
//         })
//         ->first();

//     if ($product) {
//         // If the product has a brand, redirect to the brand page
//         if ($product->brand_id) {
//             return redirect()->route('brand.show', ['id' => $product->brand_id]);
//         }
//         // Otherwise, redirect to the category page
//         return redirect()->route('category.show', ['id' => $product->category_id]);
//     }

//     // Fetch all brands to avoid the error
//     $brands = Brand::all(); 

//     return view('search_results', compact('query', 'brands'))->with('error', 'No products found.');
// }


}
