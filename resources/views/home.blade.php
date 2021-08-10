@extends('layouts/main')

@section('container')
    <div class="container-fluid" style="margin-top:6rem">
        @if(!is_null(Auth::user()) && Auth::user()->role == 'admin')
            <H1>ADMIN PAGE</H1>
        @else()
        {{-- carousel --}}
{{--        <div id="carouselExampleIndicators" class="carousel slide carousel-fade shadow-lg" data-bs-ride="carousel">--}}
{{--            <div class="carousel-inner">--}}
{{--                <div class="carousel-item active">--}}
{{--                    <img src="https://source.unsplash.com/1200x500/?product" class="d-block w-100" alt="Promo">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img src="https://source.unsplash.com/1200x500/?books" class="d-block w-100" alt="Promo 1">--}}
{{--                </div>--}}
{{--                <div class="carousel-item">--}}
{{--                    <img src="https://source.unsplash.com/1200x500/?product,books" class="d-block w-100" alt="Promo 2">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">--}}
{{--                <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                <span class="visually-hidden">Previous</span>--}}
{{--            </button>--}}
{{--            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">--}}
{{--                <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                <span class="visually-hidden">Next</span>--}}
{{--            </button>--}}
{{--        </div>--}}
        {{-- end of carousel --}}

        {{-- Products --}}
        <section id="Products">
            <div class="row mt-3 ms-3 mb-3">
                <div class="col">
                    <h1 class="fs-1"><u>Products</u></h1>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-2">
                        <div class="card">
                            <a href={{ url("Product/details/$product->slug") }} alt="{{ $product->slug }}">
{{--                                <img src="{{ asset('storage/'. substr($product->picture_path,7)) }}" class="card-img-top" alt="{{ $product->name }}">--}}
                                <img src="{{ asset($product->picture_path) }}" class="card-img-top" alt="{{ $product->name }}">
                            </a>
                            <div class="card-body">
                                <a href="/Product/details/{{ $product->slug }}" alt="{{ $product->slug }}" class="text-decoration-none text-dark">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                </a>
                                <p class="card-text text-danger fw-bolder"> Rp. {{ number_format($product->price,0) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        {{-- end of Products --}}
        @endif
    </div>
@endsection
