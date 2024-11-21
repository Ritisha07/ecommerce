<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-commerce</title>
    <!-- Tailwind CSS CDN for quick styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.khalti.com/khalti-checkout.js"></script>
</head>
<body class="font-sans antialiased bg-gradient-to-r from-blue-500 to-black-200 dark:bg-black dark:text-white/50">
    <div class="max-w-4xl mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8 text-center text-white">Welcome to our E-commerce Website</h1>

        <form action="{{ route('payment.proceed') }}" method="POST" class="space-y-6">
            @csrf
            <div class="shadow-lg rounded-lg p-6 bg-gray-700 hover:bg-gray-800 transition duration-300 ease-in-out">
                <!-- User Information (Hidden Inputs) -->
                <input type="hidden" id="user_id" name="user_id" value="1">
                <input type="hidden" id="name" name="name" value="Ram">
                <input type="hidden" id="email" name="email" value="Ramemail@gamil.com">

                <!-- Amount Input -->
                <div class="mb-4">
                    <label for="amount" class="block text-lg font-medium text-gray-300">Enter Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="Enter Amount" oninput="calculateGrandTotal()" 
                        class="w-full p-4 mt-2 border border-gray-400 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none hover:bg-gray-200" required>
                </div>

                <!-- Total Quantity Input -->
                <div class="mb-4">
                    <label for="total_quantity" class="block text-lg font-medium text-gray-300">Total Quantity</label>
                    <input type="number" id="total_quantity" name="total_quantity" placeholder="Enter Quantity" 
                    class="w-full p-4 mt-2 border border-gray-400 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none hover:bg-gray-200" required>
                </div>

                <!-- Service Charge Input -->
                <div class="mb-4">
                    <label for="service_charge" class="block text-lg font-medium text-gray-300">Service Charge (Rs)</label>
                    <input type="number" id="service_charge" name="service_charge" value="0" placeholder="Enter service charge" 
                    class="w-full p-4 mt-2 border border-gray-400 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none hover:bg-gray-200" required>
                </div>

                <!-- Delivery Charge Input -->
                <div class="mb-4">
                    <label for="delivery_charge" class="block text-lg font-medium text-gray-300">Delivery Charge (Rs)</label>
                    <input type="number" id="delivery_charge" name="delivery_charge" value="0" placeholder="Enter delivery charge" 
                    class="w-full p-4 mt-2 border border-gray-400 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none hover:bg-gray-200" required>
                </div>

                <!-- Grand Total (Calculated) -->
                <div class="mb-4">
                    <label for="grand_total" class="block text-lg font-medium text-gray-300">Total (Rs)</label>
                    <input type="number" id="grand_total" name="grand_total" class="w-full p-4 mt-2 bg-gray-100 border border-gray-400 rounded-lg shadow-sm focus:outline-none" readonly>
                </div>

                <!-- Payment Buttons Section -->
                <div class="mt-6 space-y-4">
                    <!-- eSewa Payment Button -->
                    <div class="flex justify-center">
                        <img src="{{ asset('images/esewa.png') }}" alt="eSewa Logo" class="h-14 w-24 mr-4 rounded-lg">
                        <button type="submit" class="px-6 py-3 bg-green-500 text-white rounded-lg shadow-lg hover:bg-green-600 transition duration-200 focus:ring-2 focus:ring-green-400">Click for E-sewa Payment</button>
                    </div>

                    <!-- Khalti Payment Button -->
                    <div class="flex justify-center">
                        <img src="{{ asset('images/khalti.png') }}" alt="Khalti Logo" class="h-14 w-24 mr-4 rounded-lg">
                        <a href="{{ route('khalti.pay') }}" id="payment-button" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition duration-200 focus:ring-2 focus:ring-blue-400">Click for Khalti Payment</a>
                    </div>

                    <!-- Cash Payment Button -->
                    <div class="flex justify-center mt-6">
                        <img src="{{ asset('images/cash.png') }}" alt="Cash Logo" class="h-12 w-19 mr-4 rounded-lg">
                        <button type="button" id="cash-payment-button" class="px-6 py-3 bg-yellow-500 text-white rounded-lg shadow-lg hover:bg-yellow-600 transition duration-200 focus:ring-2 focus:ring-yellow-400">Click for Cash Payment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Function to calculate the grand total
        function calculateGrandTotal() {
            const totalAmount = parseFloat(document.getElementById('amount').value) || 0;
            const totalQuantity = parseFloat(document.getElementById('total_quantity').value) || 0;
            const serviceCharge = parseFloat(document.getElementById('service_charge').value) || 0;
            const deliveryCharge = parseFloat(document.getElementById('delivery_charge').value) || 0;

            const grandTotal = (totalAmount * totalQuantity) + serviceCharge + deliveryCharge;
            document.getElementById('grand_total').value = grandTotal.toFixed(2);  // Showing the calculated value
        }

        // Trigger the grand total calculation when amount or quantity is entered
        document.getElementById('amount').addEventListener('input', calculateGrandTotal);
        document.getElementById('total_quantity').addEventListener('input', calculateGrandTotal);

        // Also, recalculate when service charge or delivery charge changes
        document.getElementById('service_charge').addEventListener('input', calculateGrandTotal);
        document.getElementById('delivery_charge').addEventListener('input', calculateGrandTotal);
    </script>

    <!-- Cash Payment Modal -->
    <div id="cash-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white rounded-lg p-6 shadow-lg w-96">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Confirm Cash Payment</h3>
            <p class="text-gray-700 mb-4">Are you sure you want to pay in cash on delivery?</p>
            <div class="flex justify-end space-x-4">
                <button id="cancel-payment" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 focus:outline-none">Cancel</button>
                <button id="confirm-payment" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:outline-none">Confirm</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cashPaymentButton = document.getElementById('cash-payment-button');
            const modal = document.getElementById('cash-modal');
            const confirmButton = document.getElementById('confirm-payment');
            const cancelButton = document.getElementById('cancel-payment');
            const paymentForm = document.querySelector('form');

            cashPaymentButton.addEventListener('click', function () {
                modal.classList.remove('hidden');
            });

            confirmButton.addEventListener('click', function () {
                modal.classList.add('hidden');
                paymentForm.submit();
                window.location.href = "{{ route('welcome') }}";
            });

            cancelButton.addEventListener('click', function () {
                modal.classList.add('hidden');
                window.location.href = "{{ route('welcome') }}";
            });
        });

        // Khalti Payment Integration
        var config = {
            "publicKey": "your_public_key",
            "productIdentity": "product_id",
            "productName": "product_name",
            "productUrl": "your_product_url",
            "eventHandler": {
                onSuccess(payload) {
                    console.log("Transaction succeeded", payload);
                    window.location.href = "/payment-success";
                },
                onError(error) {
                    console.log("Transaction failed", error);
                    window.location.href = "/payment-failure";
                }
