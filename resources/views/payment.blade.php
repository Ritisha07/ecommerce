<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 py-10">

    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Payment Details</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('payment.submit') }}" method="POST">
            @csrf

            <!-- Total Amount -->
            <div class="mb-4">
                <label for="total_amount" class="block text-gray-700 font-medium mb-2">Total Amount (Rs)</label>
                <input 
                    type="number" 
                    id="total_amount" 
                    name="total_amount" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter total amount" 
                    required 
                    oninput="calculateGrandTotal()">
            </div>

            <!-- Total Quantity -->
            <div class="mb-4">
                <label for="total_quantity" class="block text-gray-700 font-medium mb-2">Total Quantity</label>
                <input 
                    type="number" 
                    id="total_quantity" 
                    name="total_quantity" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter total quantity" 
                    required>
            </div>

            <!-- Service Charge -->
            <div class="mb-4">
                <label for="service_charge" class="block text-gray-700 font-medium mb-2">Service Charge (Rs)</label>
                <input 
                    type="number" 
                    id="service_charge" 
                    name="service_charge" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter service charge" 
                    value="0" 
                    required 
                    oninput="calculateGrandTotal()">
            </div>

            <!-- Delivery Charge -->
            <div class="mb-4">
                <label for="delivery_charge" class="block text-gray-700 font-medium mb-2">Delivery Charge (Rs)</label>
                <input 
                    type="number" 
                    id="delivery_charge" 
                    name="delivery_charge" 
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                    placeholder="Enter delivery charge" 
                    value="0" 
                    required 
                    oninput="calculateGrandTotal()">
            </div>

            <!-- Grand Total (Calculated) -->
            <div class="mb-4">
                <label for="grand_total" class="block text-gray-700 font-medium mb-2">Grand Total (Rs)</label>
                <input 
                    type="number" 
                    id="grand_total" 
                    name="grand_total" 
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100"
                    readonly>
            </div>

            <!-- Submit Button -->
            <div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none">
                    Proceed to Payment
                </button>
            </div>
        </form>
    </div>

    <script>
        // Function to calculate the grand total
        function calculateGrandTotal() {
            const totalAmount = parseFloat(document.getElementById('total_amount').value) || 0;
            const serviceCharge = parseFloat(document.getElementById('service_charge').value) || 0;
            const deliveryCharge = parseFloat(document.getElementById('delivery_charge').value) || 0;

            const grandTotal = totalAmount + serviceCharge + deliveryCharge;
            document.getElementById('grand_total').value = grandTotal.toFixed(2);
        }
    </script>

</body>
</html>
