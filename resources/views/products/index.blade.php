@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>All Products</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
</div>

<form action="{{ route('products.index') }}" method="GET" class="mb-4">
    <div class="row">
        <div class="col-md-4">
            <input type="text" name="search" class="form-control" placeholder="Search products..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
        <div class="col-md-2">
            @if(request('search'))
                <a href="{{ route('products.index') }}" class="btn btn-secondary">Clear</a>
            @endif
        </div>
    </div>
</form>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Old Price</th>
                <th>New Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->subcategory->name }}</td>
                    <td>৳{{ number_format($product->old_price, 2) }}</td>
                    <td>৳{{ number_format($product->new_price, 2) }}</td>
                    <td>
                        <a href="{{ route('products.show.slug', $product->slug) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $products->appends(request()->all())->links() }}
@endsection
