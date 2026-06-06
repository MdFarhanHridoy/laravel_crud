@extends('layouts.app')

@section('title', 'Subcategories')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3>All Subcategories</h3>
    <a href="{{ route('subcategories.create') }}" class="btn btn-primary">Add Subcategory</a>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td>{{ $subcategory->slug }}</td>
                    <td>
                        <a href="{{ route('subcategories.edit', $subcategory) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('subcategories.destroy', $subcategory) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No subcategories found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $subcategories->links() }}
@endsection
