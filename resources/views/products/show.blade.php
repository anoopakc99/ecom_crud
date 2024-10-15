@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1>{{ $product->name }}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <p><strong>Amount:</strong> {{ $product->amount }}</p>
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                </div>
                <div class="col-md-4 text-center">
                    @if ($product->image)
                    <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded">
                    @else
                    <p>No image available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>

.card {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.card-header h1 {
    font-size: 2rem;
    margin: 0;
}

.card-body p {
    font-size: 1.2rem;
}

.img-fluid {
    max-width: 100%;
    height: auto;
    border: 1px solid #ddd;
    padding: 5px;
    border-radius: 8px;
}
</style>