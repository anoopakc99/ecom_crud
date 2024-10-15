@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
    <div class="container-fluid">
        <h1 class="mb-4">Products</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary ">Add New Product</a>
        <div class="table-responsive">
            <table class="table  table-bordered mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->amount }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                @if ($product->image)
                                    <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" style="max-width: 100px; height: auto;">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;"><br>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
