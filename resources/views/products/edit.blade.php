@extends('layouts.app')

@section('title', 'Edit Product')

@section('contents')
    <h1 class="mb-0">Edit Product</h1>
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ old('price', $product->price) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ old('product_code', $product->product_code) }}" required>
            </div>
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description" required>{{ old('description', $product->description) }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
                
                @if($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="100">
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update
