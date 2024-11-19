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
<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="max-w-4xl mx-auto p-8">
        <h1 class="text-4xl font-bold mb-8 text-center">Welcome to our E-commerce Website</h1>

        <form action="{{ route('payment.proceed') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="user_id" class="block text-lg font-medium">Enter User ID</label>
                <input type="text" id="user_id" name="user_id" placeholder="Enter user ID" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label for="name" class="block text-lg font-medium">Enter Name</label>
                <input type="text" id="name" name="name" placeholder="Enter Name" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label for="email" class="block text-lg font-medium">Enter Email</label>
                <input type="email" id="email" name="email" placeholder="Enter Email" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
            </div>

            <div>
                <label for="amount" class="block text-lg font-medium">Enter Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Enter Amount" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
            </div>

                <!-- eSewa Payment Button -->
                <div class="flex justify-center">
                    <img src="{{ asset('images/esewa.png') }}" alt="eSewa Logo" class="h-12 w-20 mr-4">
                    <button type="submit" class="px-6 py-3 bg-green-500 text-white rounded-lg shadow-lg hover:bg-green-600 transition duration-200">Click for E-sewa Payment</button>
                </div>

                <!-- Khalti Payment Button -->
                <div class="flex justify-center">
                    <img src="{{ asset('images/khalti.png') }}" alt="Khalti Logo" class="h-12 w-20 mr-4">
                    <a href="{{ route('khalti.pay') }}" id="payment-button" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition duration-200">Click for Khalti Payment</a>
                </div>

                <!-- Cash Payment Button -->
                <div class="flex justify-center mt-6">
                    <img src="{{ asset('images/cash.png') }}" alt="Cash Logo" class="h-12 w-18 mr-4">
                    <button type="button" id="cash-payment-button" class="px-6 py-3 bg-yellow-500 text-white rounded-lg shadow-lg hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition duration-200">Click for Cash Payment</button>
                </div>
            </div>
        </form>

        <!-- Cash Payment Modal -->
        <div id="cash-modal" class="fixed inset-0 bg-gray-800 bg-opacity-50  flex justify-center items-center hidden">
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
            // Modal and payment button logic
                document.addEventListener('DOMContentLoaded', function () {
            const cashPaymentButton = document.getElementById('cash-payment-button');
            const modal = document.getElementById('cash-modal');
            const confirmButton = document.getElementById('confirm-payment');
            const cancelButton = document.getElementById('cancel-payment');
            const paymentForm = document.querySelector('form');

            // Show the modal when cash payment option is selected
            cashPaymentButton.addEventListener('click', function () {
                modal.classList.remove('hidden');
            });

            // Handle confirmation of cash payment
            confirmButton.addEventListener('click', function () {
                modal.classList.add('hidden');
                paymentForm.submit();  // Submit the form for cash payment
                window.location.href = "{{ route('welcome') }}"; // Redirect to welcome page
            });

            // Handle cancellation of cash payment
            cancelButton.addEventListener('click', function () {
                modal.classList.add('hidden');
                window.location.href = "{{ route('welcome') }}"; // Redirect to welcome page
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
                        },
                        onClose() {
                            console.log('Widget is closing');
                        }
                    }
                };

                var checkout = new KhaltiCheckout(config);
                var btn = document.getElementById("payment-button");
                btn.onclick = function() {
                    checkout.show({ amount: 1000 }); // Amount in paisa
                };
            });
        </script>
    </div>
</body>
</html>
