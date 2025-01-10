<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        //$products = Product::with('brand')->get();
        $flashSaleProducts = Product::where('featured_product', true)->get();
       

        $products = Product::all();
       // return view('frontend.index', compact('products'));
       return view('frontend.index', compact('flashSaleProducts', 'products'));
    }
        public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.product', compact('product'));
    }

    
}
