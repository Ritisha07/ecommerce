
@extends('layouts.app')

@section('content')
<section class="product-list mt-5">
    <div class="container">
        <div class="section-title">
            <h5>Products in {{ $category->name }}</h5>
        </div>
        <div class="product-section">
            @foreach ($products as $product)
                <div class="product-wrapper" data-aos="fade-right" data-aos-duration="100">
                    <div class="wrapper-img">
                        <a href="{{ route('product-info', ['id' => $product->id]) }}">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                        </a>
                    </div>
                    <div class="wrapper-info">
                        <a href="{{ route('product-info', ['id' => $product->id]) }}" class="wrapper-details">
                            {{ $product->name }}
                        </a>
                        <p>${{ $product->price }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
