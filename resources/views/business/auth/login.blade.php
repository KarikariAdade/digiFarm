@extends('layouts.main')
@push('extra-css')
    <link rel="stylesheet" href="{{ asset('assets/main/css/select2.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('content')
    <div class="container auth-section">
        <div class="row">
            <div class="col-md-7 mt-5">
                <h1>Register as a Company</h1>
                <div class="errorMsg"></div>
                <form class="row businessReg" action="{{ route('business.auth.register.business') }}">
                    @method('POST')
                    @csrf
                    <div class="col-md-6 form-group">
                        <label class="custom-label">Company Name</label>
                        <input type="text" class="form-control" name="company_name">
                    </div>
                    <div class="col-md-6">
                        <label class="custom-label">Email</label>
                        <input type="text" class="form-control" name="company_email">
                    </div>
                    <div class="col-md-6">
                        <label class="custom-label">Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="col-md-6">
                        <label class="custom-label">Country</label>
                        <select class="form-control select2" id="country" name="country">
                            @foreach($countries as $country)
                                <option
                                    value="{{ $country->id }}" {{ old('country') == $country->id ? 'selected' : null }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="custom-label">Region / State</label>
                        <select class="form-control select2" id="region" name="region">
                            <option></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="custom-label">City</label>
                        <input type="text" class="form-control" name="city">
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
                        <button class="btn btn-primary" type="submit" style="width: 100%;">Register</button>
                    </div>

                </form>
            </div>
            <div class="col-md-5">
                <div align="right">
                    <a href="{{ route('login') }}" title="" class="lnk-default mb-5">I am a Farmer<span class="next-btn"><i
                                class="fa fa-arrow-right"></i></span></a>
                </div>
                <div class="login-section">
                    <h2 class="pt-3 pb-3">Login as a Company</h2>
                    <form action="{{ route('business.auth.login.business') }}" method="POST">
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
                            <button class="btn btn-primary" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('extra-js')
    <script src="{{ asset('assets/main/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            let url = '',
                region = $('#region'),
                country = $('#country'),
                data;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let selectChange = country.change(function () {
                loadRegions();
            });

            if (selectChange == true) {

                loadRegions();
            }


            function loadRegions() {

                url = `{{ route('request.get.region') }}`;

                data = country.val();

                $.post(url, {'country': data}, function (response) {
                    console.log(response)
                    region.html(response.msg);
                })
            }
        })
    </script>
@endpush
