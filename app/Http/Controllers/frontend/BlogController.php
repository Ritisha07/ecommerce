<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //
    public function blogs()
    {
        return view('frontend.blogs');
    }
    public function blogsDetail()
    {
        return view('frontend.blogs-details');
    }
}
