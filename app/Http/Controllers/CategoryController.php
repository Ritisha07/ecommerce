<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    // Fetch and display all categories
    public function category()
    {
        $categories = Category::all(); 
        return view('frontend.index', compact('categories')); 
    }

    // Show products related to a specific category
    public function showSidebar($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('category_id', $category->id)->get();

        return view('frontend.product-sidebar', compact('category', 'products'));
    }
    
}
