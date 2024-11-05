@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header bg-success text-white text-center">
                    <h3 class="font-weight-light my-4">Register</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="small mb-1" for="name">Name</label>
                            <input class="form-control py-4 @error('name') is-invalid @enderror" id="name" type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" required autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="email">Email Address</label>
                            <input class="form-control py-4 @error('email') is-invalid @enderror" id="email" type="email" placeholder="Enter email address" name="email" value="{{ old('email') }}" required />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="password">Password</label>
                            <input class="form-control py-4 @error('password') is-invalid @enderror" id="password" type="password" placeholder="Enter password" name="password" required />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="password-confirm">Confirm Password</label>
                            <input class="form-control py-4" id="password-confirm" type="password" placeholder="Confirm password" name="password_confirmation" required />
                        </div>
                        <div class="form-group mt-4 mb-0">
                            <button class="btn btn-success btn-block" type="submit">Register</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <div class="small"><a href="{{ route('login') }}">Have an account? Go to login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
