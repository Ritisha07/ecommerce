<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\frontend\HomeController; 
use App\Http\Controllers\frontend\AboutController; 
use App\Http\Controllers\frontend\BlogController;  
use App\Http\Controllers\frontend\ShopController; 
use App\Http\Controllers\frontend\UserDashboardController; 
use App\Http\Controllers\frontend\ContactController; 
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\WishlistController;

Route::middleware(['auth'])->group(function () {
   
});

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('create-account');
Route::post('/register', [RegisterController::class, 'register']);

// Protected Route (after login)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/search', [ProductController::class, 'search'])->name('search');


Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('empty-cart', function () {return view('frontend.empty-cart');
})->name('empty-cart');
Route::get('/frontend/checkout', function () {return view('frontend.checkout');
})->name('checkout');

Route::get('/categories', [CategoryController::class, 'category'])->name('categories');
Route::get('/category/{id}', [CategoryController::class, 'showSidebar'])->name('category.sidebar');
Route::get('/category/{categoryName}', [CategoryController::class, 'showByCategoryName'])->name('product-sidebar');
//Route::get('/filter-products', [ProductController::class, 'filterProducts'])->name('filter.products');


Route::get('/product/{id}', [ProductController::class, 'show'])->name('product-info');

Route::get('/payment-page', function () {
    return view('frontend.payment');
})->name('payment');

Route::get('/', [HomeController::class, 'index'])->name('index'); // Home route
Route::get('/brands', [BrandController::class, 'showAll'])->name('frontend.brands');
Route::get('/products', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
//Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/frontend/product-info/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/category', [CategoryController::class, 'category'])->name('category');
Route::get('/frontend/blogs', [BlogController::class, 'blogs'])->name('blogs');
Route::get('/frontend/blogs-details', [BlogController::class, 'blogsDetail'])->name('blogs-details');
Route::get('/frontend/product-sidebar', [ShopController::class, 'shop'])->name('product-sidebar');
Route::get('/frontend/contact-us', [ContactController::class, 'contactUs']);
Route::get('/frontend/user-profile', [UserDashboardController::class, 'userProfile']);
Route::get('/frontend/about', function () {return view('frontend.about');})->name('about');
// Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
// Route::post('/wishlist/add/{product_id}', [WishlistController::class, 'add'])->name('wishlist.add');
// Route::delete('/wishlist/remove/{product_id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/wishlist/add/{product_id}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::get('/wishlist/delete/{product_id}', [WishlistController::class, 'remove'])->name('wishlist.remove');
Route::get('/wishlist/remove-all', [WishlistController::class, 'removeAll'])->name('wishlist.removeAll');

Route::get('/frontend/compaire', function () {return view('frontend.compaire');
})->name('compaire');
Route::get('/frontend/cart', function () {return view('frontend.cart');
})->name('cart');
Route::post('/cart/add/{productId}', [CartController::class, 'addToCart'])->name('cart.add');

Route::get('/frontend/product-info', function () {return view('frontend.product-info');
})->name('product-info');

// Route::get('frontend/product-info/{id}', [ProductController::class, 'show'])->name('product.show');

Route::get('/frontend/product-sidebar', function () {return view('frontend.product-sidebar');
})->name('product-sidebar');
Route::get('/frontend/terms', function () {return view('frontend.terms');
})->name('terms');
Route::get('/frontend/privacy', function () {return view('frontend.privacy');
})->name('privacy');
Route::get('/frontend/faq', function () {return view('frontend.faq');
})->name('faq');
Route::get('/frontend/flash-sale', function () {return view('frontend.flash-sale');
})->name('flash-sale');
Route::get('/frontend/sellers', function () {return view('frontend.sellers');
})->name('sellers');
Route::get('/frontend/seller-sidebar', function () {return view('frontend.seller-sidebar');
})->name('seller-sidebar');
Route::get('/frontend/become-vendor', function () {return view('frontend.become-vendor');
})->name('become-vendor');

Route::get('/shop',function(){return view('frontend.product-sidebar');
})->name('shop');


Route::get('/payment-form', function () {
    return view('payment-form');
})->name('payment-form');
//esewa
Route::post('/payment/proceed', [PaymentController::class, 'proceedPayment'])->name('payment.proceed');
Route::get('/success', [PaymentController::class, 'successPay']);
Route::get('/failed', [PaymentController::class, 'failurePay']);
//khalti
Route::get('/khalti/pay', [PaymentController::class, 'pay'])->name('khalti.pay');
Route::get('/khalti/verify', [PaymentController::class, 'verify'])->name('khalti.verify');
Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
Route::post('/payment/submit', [PaymentController::class, 'submit'])->name('payment.submit');

Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank');