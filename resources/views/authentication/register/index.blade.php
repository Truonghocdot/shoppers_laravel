@extends('layouts.user')
@section('main')
    <div class="container">
        <h2 class="text-center">Create an account for use more service</h2>
        <div class="row">
            <form class="col-6" method="POST" action="{{ route('createAccount') }}">
                @csrf
                <div class="mb-3">
                    <label for="InputName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="username" id="InputName" value="{{ old('username') }}">
                </div>
                @error('username')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="InputPhone" class="form-label">Phone Number</label>
                    <input type="number" class="form-control" name="phone" id="InputPhone" value="{{ old('phone') }}">
                </div>
                @error('phone')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="InputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="InputEmail1" aria-describedby="email"
                        value="{{ old('email') }}">
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="InputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="InputPassword1">
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                <div class="mb-3">
                    <label for="InputPassword2" class="form-label">Confirm password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="InputPassword2">
                </div>
                <div class="mb-3 d-flex align-items-center justify-content-between ">
                    <button type="submit" class="btn btn-primary">Register</button>
                    <p class="my-0 ">Do you have an account? <a href="{{ route('ShowLogin') }}">Login</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
