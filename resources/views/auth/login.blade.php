@extends('layouts.main')
@push('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/main/css/select2.min.css') }}">
@endpush
@section('content')
<div class="container auth-section">
    <div class="row">
        <div class="col-md-7 mt-5">
            <h1>Register as a Farmer</h1>
            <form class="row" method="POST" action="{{ route('register') }}">
                @method('POST')
                @csrf
                @include('layouts.register_error')
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
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation">
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    @method('POST')
                    @include('layouts.errors')
                    <div class="form-group">
                        <label>Email Address *</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label>Password *</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="login-btn">
                        <button class="btn btn-primary">Login</button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link text-success f-bold" style="float: right; " href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
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

