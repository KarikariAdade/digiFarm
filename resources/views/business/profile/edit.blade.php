@extends('layouts.business')
@push('custom-css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('business.dashboard.profile.update') }}">
                    @csrf
                    @method('POST')
                    <div class="text-center">
                        <div class="detail-pic js">
                            <div class="box">
                                <input type="file" name="business_logo" id="upload-pic" class="inputfile">
                                <label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Business Name <span class="text-danger">*</span></label>
                            <input type="text" name="business_name" class="form-control">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Primary Email <span class="text-danger">*</span></label>
                            <input type="email" name="primary_email" class="form-control">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Secondary Email</label>
                            <input type="email" name="secondary_mail" class="form-control">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Primary Phone <span class="text-danger">*</span></label>
                            <input type="email" name="primary_phone" class="form-control">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Secondary Phone</label>
                            <input type="email" name="secondary_phone" class="form-control">
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-3 form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <select class="form-control select2" id="country" name="country">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country') == $country->id || $country->id == auth()->user()->country ? 'selected' : null }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Region</label>
                            <select class="form-control select2" name="region" id="region">
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>City</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Office Address</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label>Business Type</label>
                            <select class="form-control select2">
                                <option>Ghana</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Business Size</label>
                            <select class="form-control select2" name="business_size">
                                <option>Ghana</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Tax Number</label>
                            <input type="text" name="tax_number" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description"></textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            @if(auth()->user()->is_approved != true)
                                <button class="btn btn-success">Activate Profile</button>
                            @else
                                <button class="btn btn-success">Update Profile</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('custom-js')
    <script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
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

            CKEDITOR.replace('description', {
                language: 'en',
                height: '300'
            });
        })

    </script>
@endpush
