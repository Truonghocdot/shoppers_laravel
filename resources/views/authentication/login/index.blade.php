@extends('layouts.user')
@section('main')
    <div class="container">
        <h2 class="text-center w-75 mx-auto">Welcome you come back! Please enter your email and password for use more service
        </h2>
        <div class="row">
            <form class="col-6" action="{{ route('LogonAccount') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                        aria-describedby="emailHelp" value="{{ old('email') }}">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @if ($error)
                    <span class="text-danger">{{ $error }}</span>
                @endif
                <div class="mb-3 d-flex align-items-center justify-content-between  ">
                    <button type="submit" class="btn btn-primary">Login</button>
                    <p class="my-0 ">Do you have a account? <a href="{{ route('ShowRegister') }}">Register</a></p>
                </div>
            </form>
            <div class="col-6">
            </div>
        </div>
    </div>
@endsection
