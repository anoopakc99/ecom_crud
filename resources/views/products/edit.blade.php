@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Product</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="amount">Amount</label>
                    <input type="text" name="amount" class="form-control" value="{{ old('amount', $product->amount) }}" required>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->description) }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="image">Product Image (optional)</label>
                    <input type="file" name="image" class="form-control-file">
                    @if ($product->image)
                        <div class="mt-2">
                            <p>Current Image:</p>
                            <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded" width="100">
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</div>
@endsection

<style>

    /* styles.css */
.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.card-body {
    padding: 20px;
}

.form-group label {
    font-weight: bold;
}


</style>