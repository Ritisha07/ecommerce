<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Add product to wishlist
//     public function addToWishlist($productId)
//     {
//         $user = Auth::user();

//         if (!$user) {
//             return redirect()->route('login')->with('error', 'You must be logged in to add products to your wishlist.');
//         }

//         $exists = Wishlist::where('user_id', $user->id)
//                           ->where('product_id', $productId)
//                           ->exists();

//         if ($exists) {
//             return redirect()->route('wishlist.show')->with('info', 'Product is already in your wishlist.');
//         }

//         Wishlist::create([
//             'user_id' => $user->id,
//             'product_id' => $productId
//         ]);

//         return redirect()->route('wishlist.show')->with('success', 'Product added to wishlist.');
//     }

//     // Remove product from wishlist
//     public function removeFromWishlist($id)
//     {
//         Wishlist::where('id', $id)->where('user_id', Auth::id())->delete();
//         return back()->with('success', 'Product removed from wishlist.');
//     }

//     // Show wishlist
//     public function showWishlist()
//     {
//         $user = Auth::user();

//         if (!$user) {
//             return redirect()->route('login')->with('error', 'You must be logged in to view your wishlist.');
//         }

//         $wishlistItems = Wishlist::where('user_id', $user->id)->with('product')->get();

//         return view('frontend.wishlist', compact('wishlistItems'));
//     }
// }
// Add product to wishlist (only for logged-in users)
// public function add($product_id)
// {
//     // Check if user is logged in
//     if (!auth()->check()) {
//         return redirect()->route('login')->with('error', 'You need to login to add items to your wishlist.');
//     }

//     // Get the wishlist from session
//     $wishlist = session()->get('wishlist', []);

//     // Check if the product is already in the wishlist
//     if (!in_array($product_id, $wishlist)) {
//         // Add product to wishlist if not already added
//         $wishlist[] = $product_id;

//         // Save the updated wishlist back to session
//         session()->put('wishlist', $wishlist);

//         return redirect()->route('wishlist')->with('success', 'Product added to wishlist!');
//     }

//     // Redirect to wishlist with info message
//     return redirect()->route('wishlist')->with('info', 'This product is already in your wishlist.');
// }
// Add product to wishlist (only for logged-in users)
public function index()
{
    // Retrieve wishlist items from session
    $wishlist = session()->get('wishlist', []);

    // Fetch product details using product IDs in the wishlist
    $wishlistItems = Product::whereIn('id', $wishlist)->get();

    return view('frontend.wishlist', compact('wishlistItems'));
}

public function add($product_id)
{
    // Check if user is logged in
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please log in to add products to your wishlist.');
    }

    // Retrieve wishlist from session (or create an empty one)
    $wishlist = session()->get('wishlist', []);

    // Check if product is already in the wishlist
    if (in_array($product_id, $wishlist)) {
        return redirect()->route('wishlist')->with('info', 'This product is already in your wishlist.');
    }

    // Add the product ID to the wishlist
    $wishlist[] = $product_id;

    // Save the updated wishlist back to session
    session()->put('wishlist', $wishlist);

    return redirect()->route('wishlist')->with('success', 'Product added to wishlist!');
}

    // Remove product from wishlist
    public function remove($product_id)
    {
        // Get the wishlist from session
        $wishlist = session()->get('wishlist', []);

        // Remove product from wishlist if it exists
        if (($key = array_search($product_id, $wishlist)) !== false) {
            unset($wishlist[$key]);
        }

        // Save the updated wishlist back to session
        session()->put('wishlist', $wishlist);

        return redirect()->route('wishlist')->with('success', 'Product removed from wishlist!');
    }
    public function removeAll()
{
    // Forget the entire wishlist session
    session()->forget('wishlist');

    return redirect()->route('wishlist')->with('success', 'All items removed from wishlist!');
}

}