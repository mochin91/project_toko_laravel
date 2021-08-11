@extends('layouts.main')

@section('container')
    <div class="container" style="margin-top:6rem">
        {{-- Products --}}
        <section id="Products">
            <div class="row mt-3 ms-3 mb-3">
                <div class="col">
                    <h1 class="fs-1"><u>Products</u></h1>
                </div>
            </div>
            <div class="row">
                @foreach ($datas as $product)
                    <div class="col-md-2">
                        <div class="card">
                            <a href="{{ url("Product/details/$product->slug") }}" alt="{{ $product->slug }}">
                                {{--                                <img src="{{ asset('storage/'. substr($product->picture_path,7)) }}" class="card-img-top" alt="{{ $product->name }}">--}}
                                <img src="{{ asset($product->picture_path) }}" class="card-img-top" alt="{{ $product->name }}">
                            </a>
                            <div class="card-body">
                                <a href="{{ url("Product/details/$product->slug") }}" alt="{{ $product->slug }}" class="text-decoration-none text-dark">
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
    </div>
@endsection
