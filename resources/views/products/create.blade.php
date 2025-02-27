@extends('layouts.app')

@section('title', 'Create Product')

@section('contents')
    <h1 class="mb-0">Add Product</h1>
    <hr />
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="category_id">Category</label>
                <input type="text" name="category_id" class="form-control" placeholder="Enter Category" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="Product Name" required>
            </div>
            <div class="col">
                <input type="text" name="price" class="form-control" placeholder="Price" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" required>
            </div>
            <div class="col">
                <textarea class="form-control" name="description" placeholder="Description" required></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <input type="number" name="stock_quantity" class="form-control" placeholder="Stock Quantity" required min="0">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
