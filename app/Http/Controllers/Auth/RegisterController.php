<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('auth.create-account');
    }

    // Handle registration request
    public function register(Request $request)
    {
        // Validate the request
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'phone' => 'required',
            'address' => 'required',
            'country' => 'required',
        ]);

        // Create user in 'users' table and store the instance
        $user = User::create([
            'name' => $request->fname . ' ' . $request->lname, // Combine first and last name
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Store additional user information in 'user_profiles' table
        UserProfile::create([
            'user_id' => $user->id,
            'first_name' => $request->fname,  // Use 'first_name' to match the migration
            'last_name' => $request->lname,     // Use 'last_name' to match the migration
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
        ]);

        return redirect()->route('login')->with('success', 'User registered successfully!');

    }
}
