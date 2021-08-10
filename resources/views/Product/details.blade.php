@extends('layouts/main')
{{--@dd($product)--}}
@section('container')
    <div class="container" style="margin-top: 8rem">
        <div class="row justify-content-center">
            <div class="col-md-3">
{{--                @dd($product)--}}
                <img src="{{ $product->picture_path }}" class="card-img-top" alt="{{ $product->name }}">
            </div>
            <div class="col-md-5">
                <div class="card-body pb-5">
                    <h5 class="card-title fw-bolder">{{ $product->name }}</h5>
                    <p class="card-text text-danger fw-bolder"> Rp. {{ number_format($product->price,0) }}</p>
                    <p class="card-text fw-bolder"> Category : <a href="">{{ ($product->category) }}</a></p>
                    <p class="card-text fw-bolder"> {{ ($product->description) }}</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">Qty</span>
                                <input type="number" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger w-100">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
