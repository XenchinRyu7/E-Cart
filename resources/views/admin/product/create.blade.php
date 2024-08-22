@extends('layout.app')


@section('body')
<div class="container mt-5">
    <h2 class="mb-4">Product Input Form</h2>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="name">
        </div>

        <div class="mb-3">
            <label for="productCategory" class="form-label">Category</label>
            <select name="category_id" id="">
                <option value="">Pilih Kategori</option>
                @foreach ($category as $category_id)
                    <option value="{{ $category_id->id }}" @if (old('classadmin') == $category_id->id) selected @endif>
                        {{ $category_id->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="productPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="productPrice" placeholder="Enter product price" name="price">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="productDescription" class="form-label">Description</label>
            <textarea class="form-control" id="productDescription" rows="4" name="description"
                placeholder="Enter product description"></textarea>
        </div>

        <!-- Image -->
        <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="productImage">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection