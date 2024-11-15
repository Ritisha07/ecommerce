<?php

namespace App\Http\Controllers;

use Neputer\Facades\Khalti;
use Illuminate\Http\Request;
use App\Models\Order; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; // Import Auth facade if not already
use RemoteMerge\Esewa\Client;
use RemoteMerge\Esewa\Config as EsewaConfig;
use Illuminate\Support\Facades\Redirect;
use App\Models\KhaltiPayment;
use Illuminate\Support\Str;


require '../vendor/autoload.php';


class PaymentController extends Controller
{
    // public function showForm()
    // {
    //     return view('payment.form');
    // }

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
        // config for development
        $config = new EsewaConfig([
            'success_url' => $successUrl,
            'failure_url' => $failureUrl,
        ]);
        

        // initialize eSewa client
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
        // // Check if required parameters exist
        // if (!isset($_GET['oid']) || !isset($_GET['refid']) || !isset($_GET['amt'])) {
        //     return redirect()->back()->with('error', 'Missing payment confirmation details.');
        // }

        $pid = $_GET['oid'];
        
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
            return view('thank', compact('msg', 'msg1'));
        }
    }

    public function failurePay()
    {
        // // Check if required parameters exist
        // if (!isset($_GET['oid']) || !isset($_GET['refid']) || !isset($_GET['amt'])) {
        //     return redirect()->back()->with('error', 'Missing payment confirmation details.');
        // }

        $pid = $_GET['pid'];
        // $refid = $_GET['refid'];
        // $amt = $_GET['amt'];

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
            return view('thank', compact('msg', 'msg1'));
        }
    }

    //khati
    public function pay()
    {
        // Define the return URL for verification
        $return_url = route('khalti.verify');
        $purchase_order_id = Str::uuid(); // Generate a unique transaction ID
        $purchase_order_name = "your_order_name";
        $amount = 1000; // Amount in paisa (Rs 1 = 100 paisa)

        // Initiate the payment with Khalti
        $response = Khalti::initiate($return_url, $purchase_order_id, $purchase_order_name, $amount);

        // Use firstOrCreate to handle duplicate entries gracefully
        KhaltiPayment::firstOrCreate(
            ['purchase_order_id' => $purchase_order_id],
            [
                'purchase_order_name' => $purchase_order_name,
                'amount' => $amount,
                'return_url' => $return_url,
                'payment_url' => $response->payment_url ?? null, // Handle if payment_url is missing
            ]
        );

        // Redirect to the payment URL
        return Redirect::to($response->payment_url ?? route('home'))->withErrors('Payment URL is missing!');
    }

    public function verify(Request $request)
    {
        // Retrieve the pidx from the request
        $pidx = $request->get('pidx');

        if (!$pidx) {
            return response()->json(['error' => 'Payment ID (pidx) is missing'], 400);
        }

        try {
            // Look up the payment using Khalti's API
            $response = Khalti::lookup($pidx);

            // Check if response is an array or object
            $purchaseOrderId = is_array($response)
                ? ($response['purchase_order_id'] ?? null)
                : ($response->purchase_order_id ?? null);

            if (!$purchaseOrderId) {
                return response()->json(['error' => 'Invalid response from Khalti'], 400);
            }

            // Find the payment in the database
            $payment = KhaltiPayment::where('purchase_order_id', $purchaseOrderId)->first();

            if ($payment) {
                // Update the payment record with the Khalti response details
                $payment->update([
                    'status' => is_array($response) ? $response['status'] : $response->status,
                ]);
            }

            // Return success response
            return response()->json(['message' => 'Payment verified successfully', 'data' => $response]);
        } catch (\Exception $e) {
            // Handle exceptions gracefully
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
