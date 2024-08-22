@extends('layout.app')

@section('body')
<h1>Products</h1>
<table class="table table-striped">
    <thead>
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
        <a type="button" class="btn btn-primary" href="{{ route('products.create')}}">Tambah Produk</a>
        @foreach ($products as $index => $product)
            <tr>
                <th scope="row">{{ $index + 1 }}</th>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category_id }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->image }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-secondary">Detail</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button onclick="return confirm('Yakin?')" type="button" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection