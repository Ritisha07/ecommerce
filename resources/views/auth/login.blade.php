<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./assets/images/homepage-one/icon.png">

    <!--title  -->
    <title>Shopus | Login</title>


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


    <!--------------- header-section --------------->
   
    <!--------------- header-section-end --------------->

    <!--------------- login-section --------------->
    <section class="login footer-padding">
    <div class="container">
        <div class="login-section">
            <div class="review-form">
                <h5 class="comment-title text-center font-bold text-lg">Log In</h5>

                <!-- Show Validation Errors -->
                @if ($errors->any())
                    <div class="text-red-500 bg-red-100 p-3 rounded-lg">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="review-inner-form">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email Address*</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="review-form-name checkbox flex justify-between items-center mt-3">
                            <div class="checkbox-item flex items-center">
                                <input type="checkbox" id="remember" name="remember" class="mr-2">
                                <label for="remember">Remember Me</label>
                            </div>
                            <!-- <div class="forget-pass">
                                <a href="{{ route('create-account') }}" class="text-blue-600 hover:underline">Forgot password?</a>
                            </div> -->
                        </div>

                        <div class="login-btn text-center mt-4">
                            <button type="submit" class="shop-btn bg-blue-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-blue-700 transition duration-200">
                                Log In
                            </button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-4">
                        <span class="shop-account">Don't have an account? 
                            <a href="{{ route('create-account') }}" class="text-blue-600 hover:underline">Sign Up Free</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if(session('success'))
    <script>
        window.onload = function() {
            alert("{{ session('success') }}");  // Display popup message
        };

    </script>
@endif
@if(session('message'))
    <div class="alert alert-warning">
        {{ session('message') }}
    </div>
@endif

    <!--------------- login-section-end --------------->

    <!--------------- footer-section--------------->
    
    <!--------------- footer-section-end--------------->
@endsection






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