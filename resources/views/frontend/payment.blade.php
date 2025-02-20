<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./assets/images/homepage-one/icon.png">

    <!--title  -->
    <title>Shopus | Cart</title>


    <!--------------- swiper-css ---------------->
    <link rel="stylesheet" href="./css/swiper10-bundle.min.css">

    <!--------------- bootstrap-css ---------------->
    <link rel="stylesheet" href="./css/bootstrap-5.3.2.min.css">

    <!---------------------- Range Slider ------------------->
    <link rel="stylesheet" href="css/nouislider.min.css">

    <!---------------------- Scroll ------------------->
    <link rel="stylesheet" href="css/aos-3.0.0.css">

    <!--------------- additional-css ---------------->
    <link rel="stylesheet" href="./css/style.css">



</head>

<body>
@extends('frontend.layouts.main')
@section('main-container')
<div class="flex justify-center flex-col items-center space-y-4">
    <h5 class="text-xl font-semibold text-gray-800 mb-4">Do you want to pay through?</h5>

    <!-- Payment Options -->
    <div class="flex justify-center space-x-8">
        <!-- Khalti Payment Option -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/khalti.png') }}" alt="Khalti Logo" class="h-14 w-24 mb-2 rounded-lg">
            <a href="{{ route('khalti.pay') }}" id="payment-button" class="px-6 py-3 bg-blue-600 text-black rounded-lg shadow-lg hover:bg-blue-700 transition duration-200 focus:ring-2 focus:ring-blue-400">Click for Khalti Payment</a>
        </div>

        <!-- Cash Payment Option -->
        <div class="flex flex-col items-center">
            <img src="{{ asset('images/cash.png') }}" alt="Cash Logo" class="h-12 w-19 mb-2 rounded-lg">
            <button type="button" id="cash-payment-button" class="px-6 py-3 bg-yellow-500 text-black rounded-lg shadow-lg hover:bg-yellow-600 transition duration-200 focus:ring-2 focus:ring-yellow-400">Click for Cash Payment</button>
        </div>
    </div>
</div>

<!-- Confirmation Dialog -->
<div id="confirmation-dialog" class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-xs w-full text-center">
        <p class="mb-4 text-lg font-semibold">Are you sure you want to pay through Cash?</p>
        <div class="flex justify-center space-x-4">
            <button id="confirm-cash-payment" class="px-4 py-2 bg-green-500 text-black rounded-lg hover:bg-green-600 focus:ring-2 focus:ring-green-400">Okay</button>
            <button id="cancel-payment" class="px-4 py-2 bg-red-500 text-black rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-400">Cancel</button>
        </div>
    </div>
</div>

<script>
    // Get elements
    const cashPaymentButton = document.getElementById("cash-payment-button");
    const confirmationDialog = document.getElementById("confirmation-dialog");
    const confirmButton = document.getElementById("confirm-cash-payment");
    const cancelButton = document.getElementById("cancel-payment");

    // Show confirmation dialog when clicking on the cash payment button
    cashPaymentButton.addEventListener("click", function() {
        confirmationDialog.classList.remove("hidden");
    });

    // Hide confirmation dialog when clicking "Cancel"
    cancelButton.addEventListener("click", function() {
        confirmationDialog.classList.add("hidden");
    });

    // Handle confirmation action
    confirmButton.addEventListener("click", function() {
        // You can add your cash payment logic here, for example:
        alert("You have confirmed the cash payment.");
        confirmationDialog.classList.add("hidden");
    });
</script>



     @endsection
     

     

    <!--------------- cart-section-end---------------->

    <!--------------- footer-section--------------->
    
    <!--------------- footer-section-end--------------->






    <!--------------- jQuery ---------------->
    <script src="assets/js/jquery_3.7.1.min.js"></script>

    <!--------------- bootstrap-js ---------------->
    <script src="assets/js/bootstrap_5.3.2.bundle.min.js"></script>

    <!--------------- Range-Slider-js ---------------->
    <script src="assets/js/nouislider.min.js"></script>

    <!--------------- scroll-Animation-js ---------------->
    <script src="assets/js/aos-3.0.0.js"></script>

    <!--------------- swiper-js ---------------->
    <script src="assets/js/swiper10-bundle.min.js"></script>

    <!--------------- additional-js ---------------->
    <script src="assets/js/shopus.js"></script>


</body>

</html>