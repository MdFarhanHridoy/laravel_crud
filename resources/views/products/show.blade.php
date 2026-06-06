@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
    </div>
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="text-muted">{{ $product->slug }}</p>
        <hr>
        <p><strong>Category:</strong> {{ $product->category->name }}</p>
        <p><strong>Subcategory:</strong> {{ $product->subcategory->name }}</p>
        <hr>
        <h5>Description</h5>
        <p>{{ $product->description }}</p>
        <hr>
        <div class="d-flex align-items-center gap-3">
            <h3 class="text-danger">৳{{ number_format($product->new_price, 2) }}</h3>
            <h5 class="text-muted text-decoration-line-through">৳{{ number_format($product->old_price, 2) }}</h5>
        </div>
        <p class="text-success">Save ৳{{ number_format($product->old_price - $product->new_price, 2) }}</p>
        <hr>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">Edit Product</a>
    </div>
</div>
@endsection
