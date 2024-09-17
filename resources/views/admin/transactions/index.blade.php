@extends('layout.app')

@section('body')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Transactions</h1>
        <a href="{{ route('products.create')}}" class="btn btn-primary">
            <i class="bi bi-plus-lg me-2"></i> Tambah Produk
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Nama Customer</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Produk</th>
                    <th scope="col">Total Beli</th>
                    <th scope="col">Tanggal Beli</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $index => $transaction)
                    <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $transaction->transaction->transaction_code }}</td>
                        <td>{{ $transaction->transaction->user->name }}</td>
                        <td>{{ $transaction->product->name }}</td>
                        <td>{{ $transaction->product->price }}</td>
                        <td>{{ $transaction->total }}</td>
                        <td>{{ $transaction->transaction->date }}</td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection