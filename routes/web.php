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
Route::get('/product-sidebar', function () {
    return view('product-sidebar');
})->name('product-sidebar');


Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');
Route::get('/shop', function () {
    return view('shop');
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