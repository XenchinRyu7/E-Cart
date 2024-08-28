@extends('layout.app')

@section('body')
<div class="container">
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
                            onclick="detailProduct('{{ $product->name }}', '{{ $product->description }}', '{{ $product->price }}', '{{ $product->image }}')">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

        @empty
            <h1>Product belum ada</h1>
        @endforelse
    </div>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    const detailProduct = (name, description, price, img) => {
        const modalTitle = document.querySelector('.modal-title');
        modalTitle.innerHTML = name;

        const modalDescription = document.querySelector('.modal-body .card-text.p1');
        modalDescription.innerHTML = description;

        const modalPrice = document.querySelector('.modal-body .card-text.p2');
        modalPrice.innerHTML = `Rp. ${price.toLocaleString()}`;

        const modalImage = document.querySelector('.modal-body img');
        modalImage.src = "http://127.0.0.1:8000/storage/image/" + img;
    }
</script>
@endsection