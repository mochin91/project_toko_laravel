@extends('layouts.main')

@section('container')
    <div class="container" style="margin-top: 7rem">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <h2>Pembayaran :</h2>
                                <h4> Rek. BCA :
                                    <br/>
                                    1234.1234.23
                                </h4>
                                <br/>
                                <div class="row justify-content-center">
                                    <div class="col-md-12 mb-2">
                                        <img id="preview-image-before-upload" src="https://www.riobeauty.co.uk/images/product_image_not_found.gif" class="w-100"
                                             alt="preview image" style="max-height: 25rem;">
                                    </div>
                                    <form >
                                        <input type="file" name="image" id="image">
                                        <br/>
                                        @error('image')
                                        <span class="text-danger">
                                         {{ $message }}
                                        </span>
                                        @enderror
                                        <button type="submit" class="btn btn-sm btn-danger w-100 mt-3">Upload Bukti Pembayaran</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <div class="row">
                            <div class="col-md-3">
                                <h3>Detil Order</h3>
                            </div>
                            <div class="col-md-9 text-end">
                                <h3>Total : Rp. {{ number_format($order->grand_total,0)}}</h3>
                            </div>
                        </div>
                        @foreach($datas as $data)
{{--                        @dd($datas)--}}
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->name }}</h5>
                                        <p>Qty : {{ $data->pivot->qty }}  || Price : Rp. {{ number_format($data->pivot->price,0) }} || Total : Rp. {{ number_format($data->pivot->total,0) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
