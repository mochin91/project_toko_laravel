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
                    <p class="card-text fw-bolder"> Category : {{ ($product->category) }}</p>
                    <p class="card-text fw-bolder"> {{ ($product->description) }}</p>
                    <form action="{{url('/Chart')}}" method="POST">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="email" value="{{Auth::user()->email}}">
                            <div class="col-md-6">
                                <div class="input-group flex-nowrap">
                                    <span class="input-group-text" id="addon-wrapping">Qty</span>
                                    <input type="number" class="form-control" name="qty" value="0">
                                </div>
                                @error('qty')
                                <span class="text-danger">
                                    {{$message}}
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger w-100">Add to Chart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
