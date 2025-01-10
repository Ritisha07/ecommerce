<!-- @extends('layouts.app')

@section('content')
<section class="product brand" data-aos="fade-up">
    <div class="container">
        <div class="section-title">
            <h5>All Brands</h5>
        </div>
        <div class="brand-section">
            @foreach($brands as $brand)
            <div class="product-wrapper">
                <div class="wrapper-img">
                    <img src="{{ asset('storage/' . $brand->image) }}" alt="{{ $brand->name }}">
                </div>
                <h6>{{ $brand->name }}</h6>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection -->
<!-- <?php
    return redirect()->route('home') . '#brand';
    ?> -->
    
