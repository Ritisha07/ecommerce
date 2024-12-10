<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

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