<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('frontend/assets/images/homepage-one/icon.png')}}">

    <!--title  -->
    <title>Shopus: Your One-Stop Destination for Fashion and Style</title>


    <!--------------- swiper-css ---------------->
    <link rel="stylesheet" href="{{asset('frontend/css/swiper10-bundle.min.css')}}">

    <!--------------- bootstrap-css ---------------->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap-5.3.2.min.css')}}">

    <!---------------------- Range Slider ------------------->
    <link rel="stylesheet" href="{{asset('frontendss/nouislider.min.css')}}">

    <!---------------------- Scroll ------------------->
    <link rel="stylesheet" href="{{asset('frontendss/aos-3.0.0.css')}}">

    <!--------------- additional-css ---------------->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">



</head>

<body>



    <!--------------- header-section --------------->
   
    <!--------------- header-section-end --------------->

    <!--------------- products-sidebar-section--------------->
    @extends('frontend.layouts.main')
@section('main-container')


<div class="container mt-5">
    <div class="row">
        <!-- Sidebar Section -->
        <div class="col-md-3">
            <div class="sidebar p-3 bg-light rounded shadow-sm">
                <h5 class="fw-bold custom-color">Categories</h5>
                <ul class="list-unstyled mt-3">
                    @foreach(App\Models\Category::all() as $cat)
                        <li class="mb-2">
                            <a href="{{ route('category.sidebar', ['id' => $cat->id]) }}" 
                               class="text-dark text-decoration-none d-block py-2 px-3 rounded hover-effect">
                                {{ $cat->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <!-- Product Listing Section -->
        <div class="col-md-9">
            <div class="section-title mb-4">
                <h5 class="fw-bold custom-color">Products in {{ $category->name }}</h5>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card border-0 shadow-sm product-card">
                            <a href="{{ route('product-info', ['id' => $product->id]) }}" class="text-decoration-none">
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top rounded-top" alt="{{ $product->name }}">
                            </a>
                            <div class="card-body text-center">
                                <a href="{{ route('product-info', ['id' => $product->id]) }}" class="text-dark fw-bold d-block product-title">
                                    {{ $product->name }}
                                </a>
                                <p class="text-success fw-semibold mt-1">${{ $product->regular_price }}</p>
                            </div>
                            <div class="product-cart-btn">
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="product-btn">Add to Cart</button>
                            </form>
                        </div>
                            
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .hover-effect:hover {
        background-color: rgba(0, 123, 255, 0.1);
        transition: 0.3s;
    }
    
    .product-card {
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .product-title:hover {
        color: #007bff;
    }
    .custom-color {
        color: #6f42c1; /* Purple */
    }
</style>

@endsection

    <!--------------- products-sidebar-section-end--------------->

    <!--------------- footer-section--------------->
    
    <!--------------- footer-section-end--------------->



    <!--------------- jQuery ---------------->
    <script src="{{asset('frontend/assets/js/jquery_3.7.1.min.js')}}"></script>

    <!--------------- bootstrap-js ---------------->
    <script src="{{asset('frontend/assets/js/bootstrap_5.3.2.bundle.min.js')}}"></script>

    <!--------------- Range-Slider-js ---------------->
    <script src="{{asset('frontend/assets/js/nouislider.min.js')}}"></script>

    <!--------------- scroll-Animation-js ---------------->
    <script src="{{asset('frontend/assets/js/aos-3.0.0.js')}}"></script>

    <!--------------- swiper-js ---------------->
    <script src="{{asset('frontend/assets/js/swiper10-bundle.min.js')}}"></script>

    <!--------------- additional-js ---------------->
    <script src="{{asset('frontend/assets/js/shopus.js')}}"></script>


</body>

</html>