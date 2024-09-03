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
                    <a class="btn btn-primary" href="{{ route("carts.index") }}">Keranjang</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="card p-3 my-5">
        <form action="" method="GET">
            <div class="d-flex align-items-end gap-3">
                <div class="w-100">
                    <label for="search">Search: </label>
                    <input type="text" class="form-control" id="search" name="search" @isset($_GET["search"])
                    value="{{ $_GET["search"] }}" @endisset>
                </div>
                <div class="d-flex gap-2">
                    <button class="btn btn-primary">Search</button>
                    @isset($_GET['search'])
                        <a href="/" class="btn btn-danger">Reset</a>
                    @endisset
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        @forelse ($products as $product)
            <div class="col-3">
                <div class="card">
                    <img src="{{ asset('storage/image/' . $product->image) }}" class="card-img-top" alt="..."
                        style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"> Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailProduct"
                            onclick="detailProduct('{{ $product->name }}', '{{ $product->description }}', '{{ $product->price }}', '{{ $product->image }}', '{{ $product->id }}')">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

        @empty
            <h1>Product belum ada</h1>
        @endforelse
    </div>
    <form action="{{ route('carts.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="detailProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="" alt="" style="object-fit: cover; height: 200px;" class="w-100 img-fluid">
                        <p class="card-text p1"></p>
                        <p class="card-text p2"></p>
                    </div>
                    <div class="modal-footer">
                        <input type="text" value="" hidden name="product_id">
                        <button type="submit" class="btn btn-primary">Beli</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
<script>
    const detailProduct = (name, description, price, img, id) => {
        const modalTitle = document.querySelector('.modal-title');
        modalTitle.innerHTML = name;

        const modalDescription = document.querySelector('.modal-body .card-text.p1');
        modalDescription.innerHTML = description;

        const modalPrice = document.querySelector('.modal-body .card-text.p2');
        modalPrice.innerHTML = `Rp. ${price.toLocaleString()}`;

        const modalImage = document.querySelector('.modal-body img');
        modalImage.src = "http://127.0.0.1:8000/storage/image/" + img;

        const productId = document.querySelector('form .modal-footer input');
        productId.value = id;

    }
</script>
@endsection