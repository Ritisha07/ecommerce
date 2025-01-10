@extends('frontend.layout')

@section('content')
<div class="container">
    <div class="product-detail">
        <div class="product-img">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
        </div>
        <div class="product-info">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->description }}</p>
            <div class="price">
                <span class="price-cut">${{ $product->original_price }}</span>
                <span class="new-price">${{ $product->discounted_price }}</span>
            </div>
            <div class="ratings">
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= 4)  <!-- Change this line for different ratings -->
                    <svg width="15" height="15" fill="#FFA800">
                        <path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" />
                    </svg>
                @else
                    <svg width="15" height="15" fill="#ddd">
                        <path d="M7.5 0L9.18386 5.18237H14.6329L10.2245 8.38525L11.9084 13.5676L7.5 10.3647L3.09161 13.5676L4.77547 8.38525L0.367076 5.18237H5.81614L7.5 0Z" />
                    </svg>
                @endif
            @endfor
        </div>


            <a href="{{ route('cart') }}" class="product-btn">Add to Cart</a>
        </div>
    </div>
</div>
@endsection
