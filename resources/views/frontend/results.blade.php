@extends('layouts.app')

@section('content')
    <h1>Search Results</h1>
    @if($products->isEmpty())
        <p>No products found.</p>
    @else
        <ul>
            @foreach($products as $product)
                <li>{{ $product->name }}</li>
            @endforeach
        </ul>
    @endif
@endsection