<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; // Import Auth facade if not already

require '../vendor/autoload.php';

use RemoteMerge\Esewa\Client;

class PaymentController extends Controller
{
    public function showForm()
    {
        return view('payment.form');
    }

    public function proceedPayment(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
        ]);

        // Attach `user_id` from the currently authenticated user
        $validated['user_id'] = Auth::id();




        // Generate unique product ID and retrieve amount from request
        $pid = uniqid();
        $amount = $request->input('amount');

        // Ensure amount is provided
        if (!$amount) {
            return redirect()->back()->with('error', 'Amount is required.');
        }

        // Insert order into the database
        Order::insert([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'product_id' => $pid,
            'amount' => $amount,
            'esewa_status' => 'unverified',
            'created_at' => Carbon::now(),
        ]);

        // Set success and failure callback URLs
        $successUrl = url('/success');
        $failureUrl = url('/failed');

        // Initialize eSewa client
        $esewa = new Client([
            'merchant_code' => 'EPAYTEST',
            'success_url' => $successUrl,
            'failure_url' => $failureUrl,
        ]);

        // Trigger payment
        $esewa->payment($pid, $amount, 0, 0, 0);
    }

    public function successPay()
    {
        // Check if required parameters exist
        if (!isset($_GET['oid']) || !isset($_GET['refid']) || !isset($_GET['amt'])) {
            return redirect()->back()->with('error', 'Missing payment confirmation details.');
        }

        $pid = $_GET['oid'];
        $refid = $_GET['refid'];
        $amt = $_GET['amt'];

        // Find the order based on product_id
        $order = Order::where('product_id', $pid)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Update order status to verified
        $update_status = $order->update([
            'esewa_status' => 'verified',
            'updated_at' => Carbon::now(),
        ]);

        if ($update_status) {
            $msg = 'Success';
            $msg1 = 'Payment successful';
            return view('thankyou', compact('msg', 'msg1'));
        }
    }

    public function failurePay()
    {
        // Check if required parameters exist
        if (!isset($_GET['oid']) || !isset($_GET['refid']) || !isset($_GET['amt'])) {
            return redirect()->back()->with('error', 'Missing payment confirmation details.');
        }

        $pid = $_GET['oid'];
        $refid = $_GET['refid'];
        $amt = $_GET['amt'];

        // Find the order based on product_id
        $order = Order::where('product_id', $pid)->first();

        if (!$order) {
            return redirect()->back()->with('error', 'Order not found.');
        }

        // Update order status to failed
        $update_status = $order->update([
            'esewa_status' => 'failed',
            'updated_at' => Carbon::now(),
        ]);

        if ($update_status) {
            $msg = 'Failed';
            $msg1 = 'Payment failed';
            return view('thankyou', compact('msg', 'msg1'));
        }
    }
}
