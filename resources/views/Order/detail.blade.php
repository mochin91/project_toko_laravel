@extends('layouts.main')

@section('container')
    <div class="container" style="margin-top: 7rem">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card shadow">
                            @if(!is_null(Auth::user()) && Auth::user()->role != 'admin')
                            <div class="card-body">
                                <h2>Pembayaran :</h2>
                                <h4> Rek. BCA :
                                    <br/>
                                    1234.1234.23
                                </h4>
                                <br/>
                                <div class="row justify-content-center">
                                    <div class="col-md-12 mb-2">
                                        <img id="preview-image-before-upload" src="{{$order->upload_payment_path!="" ? $order->upload_payment_path : 'https://www.riobeauty.co.uk/images/product_image_not_found.gif'}}" class="w-100"
                                             alt="preview image" style="max-height: 25rem;">
                                    </div>
                                    @if($order->upload_payment_path=="")
                                        <form action="{{url("/uploadPembayaran")}}" method="POST" enctype="multipart/form-data">
                                            @csrf @method('PATCH')
                                            <input type="hidden" name="orderId" value="{{$order->id}}">
                                            <input type="file" name="image" id="image">
                                            <br/>
                                            @error('image')
                                            <span class="text-danger">
                                            {{ $message }}
                                            </span>
                                            @enderror
                                            <button type="submit" class="btn btn-sm btn-danger w-100 mt-3">Upload Bukti Pembayaran</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                            @else
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12 mb-2">
{{--                                            @dd($order->upload_payment_path)--}}
                                            <img id="preview-image-before-upload" src="{{$order->upload_payment_path!="" ? $order->upload_payment_path : 'https://www.riobeauty.co.uk/images/product_image_not_found.gif'}}" class="w-100"
                                                 alt="preview image" style="max-height: 25rem;">
                                        </div>
                                    </div>
                                </div>
                            @endif
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
{{--                        @dd($order)--}}
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('#image').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#preview-image-before-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
@endsection
