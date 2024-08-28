@extends('layout.app')

@section('body')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Products</h1>
        <a href="{{ route('products.create')}}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i> Tambah Produk
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ number_format($product->price, 0, ',', '.') }} IDR</td>
                        <td>
                            <img src="{{ asset('storage/image/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail"
                                style="max-width: 100px;">
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-secondary me-2">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info me-2">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Yakin ingin menghapus produk ini?')" type="submit"
                                        class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection