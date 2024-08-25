@extends('layout.app')

@section('body')
<div class="container mt-5">
    <h2 class="mb-4">Product Details</h2>

    <div class="card">
        <div class="card-header">
            <h4>{{ $product->name }}</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-2"><strong>Category:</strong></div>
                <div class="col-sm-10">{{ $product->category->name }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2"><strong>Price:</strong></div>
                <div class="col-sm-10">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2"><strong>Description:</strong></div>
                <div class="col-sm-10">{{ $product->description }}</div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-2"><strong>Product Image:</strong></div>
                <div class="col-sm-10">
                    @if ($product->image)
                        <img src="{{ asset('storage/image/' . $product->image) }}" alt="{{ $product->name }}"
                            class="img-thumbnail" style="max-width: 200px;">
                    @else
                        <p>No image available.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection