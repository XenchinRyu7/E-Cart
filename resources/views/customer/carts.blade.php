@extends('layout.app')

@section('body')
<div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a class="btn btn-primary" href="{{ route('carts.index') }}">Keranjang</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="row">

        @forelse ($products as $product)
            <div class="col-3">
                <div class="card">
                    <img src="{{ asset('storage/image/' . $product->product->image) }}" class="card-img-top" alt="..."
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->product->name }}</h5>
                        <p class="card-text">{{ $product->product->description }}</p>
                        <p class="card-text"> Rp. {{ number_format($product->product->price, 0, ',', '.') }}</p>
                        <a type="button" class="btn btn-primary"
                            href="{{ route('transaction.create', ["productId" => $product->product_id]) }}">
                            Checkout
                        </a>
                        <form action="{{ route("carts.destroy", $product->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>

        @empty
            <h1>Product belum ada</h1>
        @endforelse
    </div>
</div>
@endsection