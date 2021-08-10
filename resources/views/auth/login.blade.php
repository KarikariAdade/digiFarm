{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
@extends('layouts.main')
@push('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/main/css/select2.min.css') }}">
@endpush
@section('content')
<div class="container auth-section">
    <div class="row">
        <div class="col-md-7 mt-5">
            <h1>Register as a Farmer</h1>
            <form class="row">
                <div class="col-md-6 form-group">
                    <label class="custom-label">First Name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Email Address</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Phone</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Password</label>
                    <input type="text" class="form-control" name="password">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Confirm Password</label>
                    <input type="text" class="form-control" name="password_confirmation">
                </div>
                <div class="col-md-12">
                    <button class="btn btn-primary" style="width: 100%;">Register</button>
                </div>

            </form>
        </div>
        <div class="col-md-5">
            <div align="right">
                <a href="{{ route('business.auth.login') }}" title="" class="lnk-default mb-5">I Own a Company <span class="next-btn"><i class="fa fa-arrow-right"></i></span></a>
            </div>
            <div class="login-section">
                <h2 class="pt-3 pb-3">Login as a Farmer</h2>
                <form>
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" class="form-control" name="">
                    </div>
                    <div class="form-group">
                        <label>Password *</label>
                        <input type="email" class="form-control" name="">
                    </div>
                    <div class="login-btn">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('extra-js')
    <script src="{{ asset('assets/main/js/select2.min.js') }}"></script>
@endpush

