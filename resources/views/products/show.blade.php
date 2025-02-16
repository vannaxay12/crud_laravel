@extends('layouts.app')

@section('title', 'Product Details')

@section('contents')
    <div class="container">
        <h1 class="mb-4">{{ $product->name }}</h1>
        <div class="row mb-3">
            <div class="col">
                <label for="category_id">Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                @else
                    <img src="https://via.placeholder.com/300" alt="No Image Available" class="img-fluid">
                @endif
            </div>
            <div class="col-md-6">
                <h3>Price: ${{ number_format($product->price, 2) }}</h3>
                <p><strong>Product Code:</strong> {{ $product->product_code }}</p>
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Stock Quantity:</strong> {{ $product->stock_quantity }}</p> <!-- ✅ เพิ่มจำนวนสต็อก -->
            </div>
        </div>

        <hr>

        <div class="row mt-3"> <!-- ✅ เพิ่ม margin-top -->
            <div class="d-grid">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>
            </div>
        </div>
    </div>
@endsection
