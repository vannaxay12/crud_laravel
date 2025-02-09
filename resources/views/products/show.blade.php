@extends('layouts.app')

@section('title', 'Product Details')

@section('contents')
    <div class="container">
        <h1 class="mb-4">{{ $product->name }}</h1>

        <div class="row">
            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                @else
                    <img src="https://via.placeholder.com/300" alt="No Image Available" class="img-fluid">
                @endif
            </div>
            <div class="col-md-6">
                <h3>Price: ${{ $product->price }}</h3>
                <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="d-grid">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
            </div>
        </div>
    </div>
@endsection
