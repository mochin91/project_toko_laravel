@extends('layouts.main')

@section('container')
    <div class="container" style="margin-top: 7rem">
        @foreach($datas as $data)
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow mb-3">
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-4">
                                Name : {{ $data->name }}
                            </div>
                            <div class="col-md-4">
                                Email : {{$data->email}}
                            </div>
                            <div class="col-md-4">
                                {{$data->role}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
