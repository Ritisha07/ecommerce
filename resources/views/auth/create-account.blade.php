<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="./assets/images/homepage-one/icon.png">

    <!--title  -->
    <title>Shopus | Create-Account</title>


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


    <!--------------- login-section--------------->
    <section class="login account footer-padding">
    <div class="container">
        <div class="login-section account-section ">
            <div class="review-form">
                <h5 class="comment-title text-center font-bold text-lg">Create Account</h5>

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

                <form action="{{ route('create-account') }}" method="POST">
                    @csrf

                    <div class="account-inner-form grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="review-form-name">
                            <label for="fname" class="form-label">First Name*</label>
                            <input type="text" id="fname" name="fname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="review-form-name">
                            <label for="lname" class="form-label">Last Name*</label>
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="account-inner-form grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                        <div class="review-form-name">
                            <label for="email" class="form-label">Email*</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="user@gmail.com" required>
                        </div>
                        <div class="review-form-name">
                            <label for="phone" class="form-label">Phone*</label>
                            <input type="tel" id="phone" name="phone" class="form-control" placeholder="+880388**0899" required>
                        </div>
                    </div>

                    <div class="review-form-name mt-3">
                        <label for="country" class="form-label">Country*</label>
                        <select id="country" name="country" class="form-select">
                            <option value="">Choose...</option>
                            <option value="Bangladesh">Nepal</option>
                            <option value="United States">United States</option>
                            <option value="United Kingdom" selected>United Kingdom</option>
                        </select>
                    </div>

                    <div class="review-form-name address-form mt-3">
                        <label for="address" class="form-label">Address*</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter your Address" required>
                    </div>
                    <div class="review-form-name address-form mt-3">
                        <label for="password" class="form-label">Password*</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your Password" required>
                    </div>
                    <div class="review-form-name address-form mt-3">
                        <label for="password_confirmation" class="form-label">Confirm Password*</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm your Password" required>
                    </div>
                    <!-- <div class="review-form-name mt-4 flex items-center">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms" class="ml-2">I agree to all terms and conditions of <span class="inner-text font-semibold">ShopUs</span>.</label>
                    </div> -->

                    <div class="login-btn text-center mt-6">
                        <button type="submit" class="shop-btn bg-green-600 text-white px-6 py-2 rounded-lg shadow-lg hover:bg-green-700 transition duration-200">
                            Create an Account
                        </button>
                    </div>
                    <div class="text-center mt-4">
                    <span class="shop-account">Already have an account? 
                        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log In</a>
                    </span>
                </div>
                </form>

            
            </div>
        </div>
    </div>
</section>
<script>
document.getElementById("password").addEventListener("input", function () {
    const password = this.value;
    const strongPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
    
    if (!strongPassword.test(password)) {
        this.setCustomValidity("Password must be at least 8 characters, include a number, an uppercase letter, a lowercase letter, and a special character.");
    } else {
        this.setCustomValidity("");
    }
});

document.getElementById("password_confirmation").addEventListener("input", function () {
    const password = document.getElementById("password").value;
    if (this.value !== password) {
        this.setCustomValidity("Passwords do not match.");
    } else {
        this.setCustomValidity("");
    }
});
</script>




    @endsection
    <!--------------- login-section-end --------------->

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