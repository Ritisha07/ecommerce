<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>E-commerce</title>
        <!-- Tailwind CSS CDN for quick styling -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="max-w-4xl mx-auto p-8">
            <h1 class="text-4xl font-bold mb-8 text-center">Welcome to our E-commerce Website</h1>

            <!-- Success message (commented out for now) -->
            <!-- @if(session('success'))
                <p class="text-green-500 text-lg">{{ session('success') }}</p>
            @endif -->

            <form action="{{ route('payment.proceed') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="user_id" class="block text-lg font-medium">Enter User ID</label>
                    <input type="text" id="user_id" name="user_id" placeholder="Enter user ID" class="w-full p-3 mt-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label for="name" class="block text-lg font-medium">Enter Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter Name" class="w-full p-3 mt-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label for="email" class="block text-lg font-medium">Enter Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email" class="w-full p-3 mt-2 border border-gray-300 rounded-lg">
                </div>

                <div>
                    <label for="amount" class="block text-lg font-medium">Enter Amount</label>
                    <input type="number" id="amount" name="amount" placeholder="Enter Amount" class="w-full p-3 mt-2 border border-gray-300 rounded-lg">
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-lg hover:bg-blue-600 transition duration-200">Click for E-sewa Payment</button>
                </div>
            </form>

            <!-- Khalti Payment Button -->
            <div class="flex justify-center mt-6">
                <a href="{{ route('khalti.pay') }}" id="payment-button" class="px-6 py-3 bg-yellow-500 text-white rounded-lg shadow-lg hover:bg-yellow-600 transition duration-200">Click for Khalti Payment</a>
            </div>

            <script>
                var config = {
                    "publicKey": "your_public_key",
                    "productIdentity": "product_id",
                    "productName": "product_name",
                    "productUrl": "your_product_url",
                    "eventHandler": {
                        onSuccess(payload) {
                            // This is where you handle the success response
                            console.log("Transaction succeeded", payload);
                        },
                        onError(error) {
                            console.log("Transaction failed", error);
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
            </script>
        </div>
    </body>
</html>
