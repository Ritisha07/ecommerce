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
                    <h5 class="comment-title">Log In</h5>
                    <div class="review-inner-form ">
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email Address**</label>
                            <input type="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="review-form-name">
                            <label for="password" class="form-label">Password*</label>
                            <input type="password" id="password" class="form-control" placeholder="password">
                        </div>
                        <div class="review-form-name checkbox">
                            <div class="checkbox-item">
                                <input type="checkbox">
                                <span class="address">
                                    Remember Me</span>
                            </div>
                            <div class="forget-pass">
                                <p>Forgot password?</p>
                            </div>
                        </div>
                    </div>
                    <div class="login-btn text-center">
                        <a href="#" class="shop-btn">Log In</a>
                        <span class="shop-account">Dont't have an account ?<a href="create-account.html">Sign Up
                                Free</a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
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