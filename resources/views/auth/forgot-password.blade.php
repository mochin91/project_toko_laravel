@extends('layouts/main')

@section('container')
    <div class="container" style="margin-top: 7rem">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    @if(session(('status')))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
                            @error('email')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger w-50">Send reset link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
