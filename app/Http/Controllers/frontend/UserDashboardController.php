<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //
    public function userProfile()
    {
        return view('frontend.user-profile');

    }
}
