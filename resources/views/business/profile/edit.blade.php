@extends('layouts.business')
@push('custom-css')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('business.dashboard.profile.update') }}" enctype="multipart/form-data">
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
                    <div style="margin-top: -30px; color: #fff">
                        @include('layouts.errors')
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Business Name <span class="text-danger">*</span></label>
                            <input type="text" name="business_name" class="form-control" value="{{ old('business_name') ?? $business->name }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Primary Email <span class="text-danger">*</span></label>
                            <input type="email" name="primary_email" class="form-control" value="{{ old('primary_email') ?? $business->email }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Secondary Email</label>
                            <input type="email" name="secondary_email" class="form-control" value="{{ old('secondary_email') ?? $business->secondary_email }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Primary Phone <span class="text-danger">*</span></label>
                            <input type="text" name="primary_phone" class="form-control" value="{{ old('primary_phone') ?? $business->primary_phone }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Secondary Phone</label>
                            <input type="text" name="secondary_phone" class="form-control" value="{{ old('secondary_phone') ?? $business->secondary_phone }}">
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-3 form-group">
                            <label>Country <span class="text-danger">*</span></label>
                            <select class="form-control select2" id="country" name="country">
                                <option></option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}" {{ old('country') == $country->id || $country->id == $business->country ? 'selected' : null }}>{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Region <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="region" id="region">
                                @if($business->region)
                                    <option value="{{ $business->region }}">{{ $business->region }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="city" value="{{ old('city') ?? $business->city }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Office Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="office_address" value="{{ old('office_address') ?? $business->address }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-3">
                            <label>Business Type <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="business_type">
                                <option></option>
                                @foreach($business_types as $business_type)
                                    <option value="{{ $business_type->id }}" {{ old('business_type') == $business_type->id || $business_type->id == $business->type_id ? 'selected' : null }}>{{ $business_type->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Business Size</label>
                            <select class="form-control select2" name="business_size">
                                <option></option>
                                @foreach($business_sizes as $business_size)
                                    <option value="{{ $business_size->id }}" {{ old('business_size') == $business_size->id || $business_size->id == $business->business_size ? 'selected' : null }}>{{ $business_size->size }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Tax Number <span class="text-danger">*</span></label>
                            <input type="text" name="tax_number" class="form-control" value="{{ old('tax_number') ?? $business->tax_number }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Business Certificate (Copy) <span class="text-danger">*</span></label>
                            <input type="file" name="business_certificate" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Facebook Url</label>
                            <input type="url" name="facebook_url" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Instagram Url</label>
                            <input type="url" name="instagram_url" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Twitter Url</label>
                            <input type="url" name="twitter_url" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>LinkedIn Url</label>
                            <input type="url" name="linkedin_url" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Website Url</label>
                            <input type="url" name="website_url" class="form-control">
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') ?? $business->description }}</textarea>
                        </div>
                        <div class="col-md-12 text-center">
                            @if(auth()->user()->is_approved != true)
                                <button class="btn btn-success" type="submit">Activate Profile</button>
                            @else
                                <button class="btn btn-success" type="submit">Update Profile</button>
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

            loadRegions()


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
