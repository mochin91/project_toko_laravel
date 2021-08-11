@extends('layouts.main')

@section('container')
    <div class="container" style="margin-top: 7rem">
        <div class="row justify-content-center">
            @foreach($user->product as $u)
                @if($u->pivot->status)
                    <div class="col-md-10">
                        <div class="card shadow mb-3">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-3">
                                            {{--                                <img src="{{ asset('storage/'. substr($product->picture_path,7)) }}" class="card-img-top" alt="{{ $product->name }}">--}}
                                            <img src="{{ asset($u->picture_path) }}" class="card-img-top" alt="{{ $u->name }}">
                                        </div>
                                        <div class="col-9">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $u->name }}</h5>
                                                <p>Qty : {{ $u->pivot->qty }}  || Price : Rp. {{ number_format($u->price,0) }} || Total : Rp. {{ number_format($u->price*$u->pivot->qty,0) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 text-end ">
                                    <form action="{{url("Chart/".$u->pivot->product_id."/".$u->pivot->user_id."/". Auth::user()->email)}}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="btn btn-danger btn-sm w-50">X</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row mt-3 mb-5 justify-content-center">
            <div class="col-md-4">
                <h3>Total : Rp. {{ number_format($total,0) }}</h3>
            </div>
            <div class="col-md-6 text-end">
                <form action="{{url("/Order")}}" id="order-form" method="POST">
                    @csrf
                    <input type="hidden" value="{{$user->id}}" name="userId">
                    <input type="hidden" value="{{$total}}" name="grandTotal">
                    <button type="submit" class="btn btn-success btn-cl w-25 fw-bolder" >Check Out</button>
                </form>
            </div>
        </div>
    </div>
@endsection
