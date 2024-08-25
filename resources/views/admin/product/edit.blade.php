@extends('layout.app')

@section('body')
<div class="container mt-5">
    <h2 class="mb-4">Product Input Form</h2>
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="name"
                value="{{ $product->name }}">
        </div>

        <div class="mb-3">
            <label for="productCategory" class="form-label">Category</label>
            <select name="category_id" id="productCategory" class="form-control">
                <option value="">Pilih Kategori</option>
                @foreach ($category as $category_id)
                    <option value="{{ $category_id->id }}" @if (old('category_id', $product->category_id) == $category_id->id)
                    selected @endif>
                        {{ $category_id->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="productPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="productPrice" name="price" value="{{ $product->price }}">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="productDescription" class="form-label">Description</label>
            <textarea class="form-control" id="productDescription" rows="4"
                name="description">{{ old('description', $product->description) }}</textarea>
        </div>


        <!-- Image -->
        <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="productImage" name="image">
            @if ($product->image != null)
                <img src="{{ asset('storage/image/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail"
                    style="max-width: 100px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary mb-5">Update</button>
    </form>
</div> @endsection