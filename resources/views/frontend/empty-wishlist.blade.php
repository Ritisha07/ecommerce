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


    <!--------------- header-section --------------->
   
    <!--------------- header-section-end --------------->
    @extends('frontend.layouts.main')
@section('main-container')

    <!--------------- wishlist-section---------------->
    <section class="blog about-blog footer-padding">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Wishlist</a></span>
            </div>
            <div class="blog-item" data-aos="fade-up">
                <div class="cart-img">
                    <img src="./assets/images/homepage-one/empty-wishlist.webp" alt="">
                </div>
                <div class="cart-content">
                    <p class="content-title">Empty! You don’t Cart any Products </p>
                    <a href="product-sidebar.html" class="shop-btn">Back to Shop</a>
                </div>
            </div>
        </div>
    </section>
    @endsection
    <!--------------- wishlist-section-end---------------->

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