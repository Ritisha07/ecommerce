<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    // Function to add a product to the cart
                public function addToCart(Request $request, $productId)
            {
                $product = Product::find($productId);
                if (!$product) {
                    return redirect()->back()->with('error', 'Product not found!');
                }

                // Get cart from session
                $cart = session()->get('cart', []);

                // Check if product exists in cart
                if (isset($cart[$productId])) {
                    $cart[$productId]['quantity'] += 1;
                } else {
                    // Add product to cart
                    $cart[$productId] = [
                        'id' => $product->id,
                        'name' => $product->name,
                        'image' => $product->image,
                        'regular_price' => $product->regular_price,
                        'quantity' => 1
                    ];
                }

                // Save to session
                session()->put('cart', $cart);

                return redirect()->route('cart.show')->with('success', 'Product added to cart!');
            }

                // Function to display the cart
                public function showCart()
                {
                    $cartItems = Cart::all(); // Retrieve all cart items
                    return view('frontend.cart', compact('cartItems'));
                }

                // Function to remove an item from the cart
                // public function removeFromCart($cartId)
                //     {
                //         $cartItem = Cart::find($cartId);

                //         if (!$cartItem) {
                //             return redirect()->route('cart.show')->with('error', 'Cart item not found!');
                //         }

                //         $cartItem->delete(); // Remove the item

                //         return redirect()->route('cart.show')->with('success', 'Product removed from cart!');
                //     }
                public function updateCart(Request $request, $productId)
                    {
                        $cart = session()->get('cart', []);

                        if (isset($cart[$productId])) {
                            if ($request->action == 'increase') {
                                $cart[$productId]['quantity'] += 1;
                            } elseif ($request->action == 'decrease' && $cart[$productId]['quantity'] > 1) {
                                $cart[$productId]['quantity'] -= 1;
                            }
                        }

                        session()->put('cart', $cart);

                        return redirect()->route('cart.show')->with('success', 'Cart updated successfully!');
                    }

public function removeFromCart($productId)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$productId])) {
        unset($cart[$productId]);
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.show')->with('success', 'Product removed from cart!');
}

}
