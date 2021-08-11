@extends('layouts.main')

@section('container')
    <div class="container" style="margin-top: 7rem">
        @foreach($datas as $data)
            {{--            @dd($data)--}}
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <a href="{{url("Detail/Order/$data->id")}}" class="text-decoration-none text-dark">
                        <div class="card shadow mb-3">
                            <div class="card-body text-center">
                                <div class="row fw-bold">
                                    <div class="col-md-3">
                                        Tanggal : {{  date_format($data->created_at, "d/m/y H:i:s")}}
                                    </div>
                                    <div class="col-md-3">
                                        Order ID : {{ $data->order_id }}
                                    </div>
                                    <div class="col-md-3">
                                        Total : Rp. {{ number_format($data->grand_total,0)}}
                                    </div>
                                    <div class="col-md-3">
                                        Paid : {{$data->paid ? 'Bayar' : 'Belum Bayar'}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
