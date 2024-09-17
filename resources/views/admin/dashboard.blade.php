@extends('layout.app')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h2>Product</h2>
                <h1>{{ $productCount }}</h1>
                <a class="btn btn-primary" href="{{ route('products.index') }}">Product</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h2>Transactions</h2>
                <h1>{{ $transcationCount }}</h1>
                <a class="btn btn-primary" href="/admin/transaction">See All Transaction</a>
            </div>
        </div>
    </div>
</div>
@endsection