<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\frontend\HomeController; 
use App\Http\Controllers\frontend\AboutController; 
use App\Http\Controllers\frontend\BlogController; 
use App\Http\Controllers\frontend\PagesController; 
use App\Http\Controllers\frontend\ShopController; 
use App\Http\Controllers\frontend\UserDashboardController; 
use App\Http\Controllers\frontend\ContactController; 
Route::get('/index', [HomeController::class, 'index']);
Route::get('/frontend/index', [HomeController::class, 'index'])->name('index');
// Route::get('/frontend/about', [AboutController::class, 'about']);
Route::get('/frontend/blogs', [BlogController::class, 'blogs'])->name('blogs');
Route::get('/frontend/blogs-details', [BlogController::class, 'blogsDetail'])->name('blogs-details');
Route::get('/frontend/product-sidebar', [ShopController::class, 'shop'])->name('product-sidebar');
Route::get('/frontend/contact-us', [ContactController::class, 'contactUs']);
Route::get('/frontend/user-profile', [UserDashboardController::class, 'userProfile']);
Route::get('/frontend/about', function () {return view('frontend.about');
})->name('about');

Route::get('/frontend/wishlist', function () {return view('frontend.wishlist');
})->name('wishlist');
Route::get('/frontend/compaire', function () {return view('frontend.compaire');
})->name('compaire');
Route::get('/frontend/cart', function () {return view('frontend.cart');
})->name('cart');
Route::get('/frontend/product-info', function () {return view('frontend.product-info');
})->name('product-info');
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


Route::get('/shop',function(){return view('shop');
})->name('shop');








Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('home');
});
Route::get('/payment', [PaymentController::class, 'showForm'])->name('payment.form');
Route::post('/payment/proceed', [PaymentController::class, 'proceedPayment'])->name('payment.proceed');
Route::get('/success', [PaymentController::class, 'successPay']);
Route::get('/failed', [PaymentController::class, 'failurePay']);


Route::get('/khalti/pay', [PaymentController::class, 'pay'])->name('khalti.pay');
Route::get('/khalti/verify', [PaymentController::class, 'verify'])->name('khalti.verify');
Route::get('/payment', [PaymentController::class, 'showPaymentPage'])->name('payment.page');
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');
Route::post('/payment/submit', [PaymentController::class, 'submit'])->name('payment.submit');

Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank');