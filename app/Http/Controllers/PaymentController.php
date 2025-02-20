<?php

namespace App\Http\Controllers;

use Neputer\Facades\Khalti;
use Illuminate\Http\Request;
use App\Models\Order; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth; 
use RemoteMerge\Esewa\Client;
use RemoteMerge\Esewa\Config as EsewaConfig;
use Illuminate\Support\Facades\Redirect;
use App\Models\KhaltiPayment;
use Illuminate\Support\Str;
use App\Models\Payment;

require '../vendor/autoload.php';

class PaymentController extends Controller
{
    public function showPaymentPage()
    {
        return view('payment-form');
    }

    public function submitPayment(Request $request)
    {
        // Validate the request inputs
        $validated = $request->validate([
            'total_amount' => 'required|numeric|min:0',
            'total_quantity' => 'required|numeric|min:1',
            'service_charge' => 'required|numeric|min:0',
            'delivery_charge' => 'required|numeric|min:0',
            'grand_total' => 'required|numeric|min:0',
        ]);

        // Store the payment details in the database
        Payment::create($validated);

        return redirect()->route('payment.page')->with('success', 'Payment details saved successfully!');
    }

    public function proceedPayment(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'amount' => 'required|numeric|min:1',
            ]);
    
            // Attach `user_id` from the currently authenticated user
            $validated['user_id'] = Auth::id();
    
            // Generate unique product ID and retrieve amount from request
            $pid = uniqid();
            $amount = $request->input('grand_total');
            $charge = $request->input('delivery_charge');
            
            // Ensure $charge is a valid float, default to 0.0 if not provided or null
            $deliveryAmount = $charge !== null ? (float)$charge : 0.0;
    
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
            $esewa->payment($pid, $amount, 0, 0);
        } catch(\Exception $e) {
            $msg = 'Failed';
            $msg1 = 'Failed: ' . $e->getMessage();
            return view('thank', compact('msg', 'msg1'));
        }
    }

    public function successPay()
    {
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
        $pid = $_GET['pid'];

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

//khalti
    public function pay()
    {
        // Retrieve the cart from the session
        $cart = session()->get('cart', []);
        
        // Calculate the total amount
        $amount = collect($cart)->sum(fn($item) => $item['sale_price'] * $item['quantity']);
        $amount = $amount * 100;
        // If cart is empty, return with an error
        if ($amount <= 0) {
            return redirect()->route('cart.show')->withErrors('Your cart is empty!');
        }

        $return_url = route('khalti.verify');
        $purchase_order_id = Str::uuid(); // Generate a unique transaction ID
        $purchase_order_name = "Cart Purchase"; // Customize as needed

        try {
            // Initiate the payment with Khalti
            $response = Khalti::initiate($return_url, $purchase_order_id, $purchase_order_name, $amount);

            // Check if the response contains the payment URL
            if (isset($response->payment_url)) {
                // Store payment details
                KhaltiPayment::firstOrCreate(
                    ['purchase_order_id' => $purchase_order_id],
                    [
                        'purchase_order_name' => $purchase_order_name,
                        'amount' => $amount,
                        'return_url' => $return_url,
                        'payment_url' => $response->payment_url,
                    ]
                );

                // Redirect to the payment URL
                return Redirect::to($response->payment_url);
            } else {
                return redirect()->route('cart.show')->withErrors('Payment URL is missing!');
            }
        } catch (\Exception $e) {
            return redirect()->route('cart.show')->withErrors('Error: ' . $e->getMessage());
        }
    }

    public function verify(Request $request)
{
    $pidx = $request->get('pidx');

    if (!$pidx) {
        return response()->json(['error' => 'Payment ID (pidx) is missing'], 400);
    }

    try {
        $response = Khalti::lookup($pidx);
        \Log::info('Khalti API Response:', (array) $response);

        // Log the product_id if present
        $productId = isset($response['product_id']) ? $response['product_id'] : null;
        \Log::info('Product ID:', [$productId]);

        $purchaseOrderId = is_array($response)
            ? ($response['purchase_order_id'] ?? null)
            : ($response->purchase_order_id ?? null);

        if (!$purchaseOrderId) {
            return response()->json(['error' => 'Invalid response from Khalti'], 400);
        }

        // Find the payment in the database
        $payment = KhaltiPayment::where('purchase_order_id', $purchaseOrderId)->first();

        if ($payment) {
            $payment->update([
                'status' => is_array($response) ? $response['status'] : $response->status,
                'product_id' => $productId, // Add product_id to database if needed
            ]);
        }

        return redirect()->route('index')->with('success', 'Payment was successful!');
    } catch (\Exception $e) {
        \Log::error('Payment verification error: ' . $e->getMessage());
        return response()->json(['error' => 'An error occurred while processing the payment.'], 500);
    }
}

}

