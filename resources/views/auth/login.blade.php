@extends('layouts/main')

@section('container')
    <div class="container" style="margin-top: 7rem">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow">
                    <form action="{{ route('login') }}" method="POST">
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
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                            <span class="text-danger">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="{{route('password.email')}}" class="">Forgot password ?</a>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-danger w-100">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
