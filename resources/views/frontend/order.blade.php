<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./assets/images/homepage-one/icon.png">

    <!--title  -->
    <title>Shopus: Your One-Stop Destination for Fashion and Style</title>


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

    <!--------------- blog-tittle-section---------------->
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Order</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Order</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- order-section---------------->
    <section class="order product footer-padding">
        <div class="container">
            <div class="order-title">
                <h5 class="wrapper-heading">Track Your Order</h5>
                <p class="paragraph">Enter your order taracking number and your secreet id.</p>
                <div class="order-section">
                    <div class="row gy-5">
                        <div class="col-lg-8">
                            <div class="login-section">
                                <div class="review-form">
                                    <div class="review-inner-form ">
                                        <div class="review-form-name">
                                            <label for="track-number" class="form-label">Order Tracking Number**</label>
                                            <input type="number" id="track-number" class="form-control"
                                                placeholder="Order Number">
                                        </div>
                                        <div class="review-form-name">
                                            <label for="Delivery" class="form-label">Delivery Date*</label>
                                            <input type="date" id="Delivery" class="form-control">
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Track Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="order-img text-center" data-aos="fade-right" data-aos-duration="1000">
                                <img src="./assets/images/homepage-one/order.png" alt="order">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--------------- order-section-end---------------->

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