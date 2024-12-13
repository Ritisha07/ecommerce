<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./assets/images/homepage-one/icon.png">

    <!--title  -->
    <title>Shopus | Checkout</title>


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

    <!--------------- blog-tittle-section---------------->
    @extends('frontend.layouts.main')
@section('main-container')
    <section class="blog about-blog">
        <div class="container">
            <div class="blog-bradcrum">
                <span><a href="index.html">Home</a></span>
                <span class="devider">/</span>
                <span><a href="#">Checkout</a></span>
            </div>
            <div class="blog-heading about-heading">
                <h1 class="heading">Checkout</h1>
            </div>
        </div>
    </section>
    <!--------------- blog-tittle-section-end---------------->

    <!--------------- checkout-section---------------->
    <section class="checkout product footer-padding">
        <div class="container">
            <div class="checkout-section">
                <div class="row gy-5">
                    <div class="col-lg-6">
                        <div class="checkout-wrapper">
                            <a href="login.html" class="shop-btn">Log into Your Account</a>
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading">Billing Details</h5>
                                <div class="review-form">
                                    <div class=" account-inner-form">
                                        <div class="review-form-name">
                                            <label for="fname" class="form-label">First Name*</label>
                                            <input type="text" id="fname" class="form-control" placeholder="First Name">
                                        </div>
                                        <div class="review-form-name">
                                            <label for="lname" class="form-label">Last Name*</label>
                                            <input type="text" id="lname" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>
                                    <div class=" account-inner-form">
                                        <div class="review-form-name">
                                            <label for="email" class="form-label">Email*</label>
                                            <input type="email" id="email" class="form-control"
                                                placeholder="user@gmail.com">
                                        </div>
                                        <div class="review-form-name">
                                            <label for="phone" class="form-label">Phone*</label>
                                            <input type="tel" id="phone" class="form-control"
                                                placeholder="+880388**0899">
                                        </div>
                                    </div>
                                    <div class="review-form-name">
                                        <label for="country" class="form-label">Country*</label>
                                        <select id="country" class="form-select">
                                            <option>Choose...</option>
                                            <option>Bangladesh</option>
                                            <option>United States</option>
                                            <option selected>United Kingdom</option>
                                        </select>
                                    </div>
                                    <div class="review-form-name address-form">
                                        <label for="address" class="form-label">Address*</label>
                                        <input type="text" id="address" class="form-control"
                                            placeholder="Enter your Address">
                                    </div>
                                    <div class=" account-inner-form city-inner-form">
                                        <div class="review-form-name">
                                            <label for="city" class="form-label">Town / City*</label>
                                            <select id="city" class="form-select">
                                                <option>Choose...</option>
                                                <option>Newyork</option>
                                                <option>Dhaka</option>
                                                <option selected>London</option>
                                            </select>
                                        </div>
                                        <div class="review-form-name">
                                            <label for="number" class="form-label">Postcode / ZIP*</label>
                                            <input type="number" id="number" class="form-control" placeholder="0000">
                                        </div>
                                    </div>


                                    <div class="review-form-name checkbox">
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="account">
                                            <label for="account" class="form-label">
                                                Create an account?</label>
                                        </div>
                                    </div>
                                    <div class="review-form-name shipping">
                                        <h5 class="wrapper-heading">Shipping Address</h5>
                                        <div class="checkbox-item">
                                            <input type="checkbox" id="remember">
                                            <label for="remember" class="form-label">
                                                Create an account?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-wrapper">
                            <a href="#" class="shop-btn">Enter Coupon Code</a>
                            <div class="account-section billing-section">
                                <h5 class="wrapper-heading">Order Summary</h5>
                                <div class="order-summery">
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">PRODUCT</h5>
                                        <h5 class="wrapper-heading">TOTAL</h5>
                                    </div>
                                    <hr>
                                    <div class="subtotal product-total">
                                        <ul class="product-list">
                                            <li>
                                                <div class="product-info">
                                                    <h5 class="wrapper-heading">Apple Watch X1</h5>
                                                    <p class="paragraph">64GB, Black, 44mm, Chain Belt</p>
                                                </div>
                                                <div class="price">
                                                    <h5 class="wrapper-heading">$38</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-info">
                                                    <h5 class="wrapper-heading">Beats Wireless x1</h5>
                                                    <p class="paragraph">64GB, Black, 44mm, Chain Belt</p>
                                                </div>
                                                <div class="price">
                                                    <h5 class="wrapper-heading">$48</h5>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="product-info">
                                                    <h5 class="wrapper-heading">Samsung Galaxy S10 x2</h5>
                                                    <p class="paragraph">12GB RAM, 512GB, Dark Blue</p>
                                                </div>
                                                <div class="price">
                                                    <h5 class="wrapper-heading">$279</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="subtotal product-total">
                                        <h5 class="wrapper-heading">SUBTOTAL</h5>
                                        <h5 class="wrapper-heading">$365</h5>
                                    </div>
                                    <div class="subtotal product-total">
                                        <ul class="product-list">
                                            <li>
                                                <div class="product-info">
                                                    <p class="paragraph">SHIPPING</p>
                                                    <h5 class="wrapper-heading">Free Shipping</h5>

                                                </div>
                                                <div class="price">
                                                    <h5 class="wrapper-heading">+$0</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="subtotal total">
                                        <h5 class="wrapper-heading">TOTAL</h5>
                                        <h5 class="wrapper-heading price">$365</h5>
                                    </div>
                                    <div class="subtotal payment-type">
                                        <div class="checkbox-item">
                                            <input type="radio" id="bank" name="bank">
                                            <div class="bank">
                                                <h5 class="wrapper-heading">Direct Bank Transfer</h5>
                                                <p class="paragraph">Make your payment directly into our bank account.
                                                    Please use
                                                    <span class="inner-text">
                                                        your Order ID as the payment reference.
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" id="cash" name="bank">
                                            <div class="cash">
                                                <h5 class="wrapper-heading">Cash on Delivery</h5>
                                            </div>
                                        </div>
                                        <div class="checkbox-item">
                                            <input type="radio" id="credit" name="bank">
                                            <div class="credit">
                                                <h5 class="wrapper-heading">Credit/Debit Cards or Paypal</h5>

                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="shop-btn">Place Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    <!--------------- checkout-section-end---------------->

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