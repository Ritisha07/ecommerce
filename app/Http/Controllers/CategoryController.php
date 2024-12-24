<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all(); // Fetch all categories
        return view('frontend.category', compact('categories')); // Pass categories to the category-specific view
    }

    public function show($id)
    {
        $category = Category::findOrFail($id); // Fetch the category by ID
        $products = $category->products; // Assuming a relationship exists with a Product model
        return view('frontend.product-sidebar', compact('category', 'products')); // Render category-specific page
    }
}
