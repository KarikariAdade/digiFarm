{{-- <html>
<head>
    <title>

    </title>
</head>
<body>
<form method="POST" action="{{ route('business.auth.login.business') }}">
    @csrf
    @method('POST') --}}
{{--    @include('layouts.errors')--}}
{{--     <div class="form-group form-focus">
        <input type="email" class="form-control floating" name="email">
        <label class="focus-label">Email</label>
    </div>
    <div class="form-group form-focus">
        <input type="password" class="form-control floating" name="password">
        <label class="focus-label">Password</label>
    </div>
    <button type="submit">Submit</button>
</form>
</body>
</html> --}}
@extends('layouts.main')
@push('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/main/css/select2.min.css') }}">
@endpush
@section('content')
<div class="container auth-section">
    <div class="row">
        <div class="col-md-7 mt-5">
            <h1>Register as a Company</h1>
            <form class="row">
                <div class="col-md-6 form-group">
                    <label class="custom-label">Company Name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Email</label>
                    <input type="text" class="form-control" name="last_name">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Phone</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Country</label>
                    <select class="form-control select2">
                        <option>Country</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="custom-label">Region / State</label>
                    <input type="text" class="form-control" name="phone">
                </div>
                <div class="col-md-6">
                    <label class="custom-label">City</label>
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
                <a href="#" title="" class="lnk-default mb-5">I am a Farmer<span class="next-btn"><i class="fa fa-arrow-right"></i></span></a>
            </div>
            <div class="login-section">
                <h2 class="pt-3 pb-3">Login as a Company</h2>
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
