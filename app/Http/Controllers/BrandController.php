<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
        public function index()
        {
            $brands = Brand::all();
            return view('frontend.index', compact('brands'));
        }

        public function showAll()
        {
            $brands = Brand::all();
            return view('frontend.brand', compact('brands'));
        }
}
