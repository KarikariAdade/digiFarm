@extends('layouts.business')
@push('custom-css')
    <script type="text/javascript" src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
@endpush
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form method="POST" action="">
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
                            <label>Primary Phone</label>
                            <input type="email" name="secondary_mail" class="form-control">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Scondary Phone</label>
                            <input type="email" name="secondary_mail" class="form-control">
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-3 form-group">
                            <label>Country</label>
                            <select class="form-control select2">
                                <option>Ghana</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Region</label>
                            <select class="form-control select2">
                                <option>Ghana</option>
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
                            <select class="form-control select2">
                                <option>Ghana</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Tax Number</label>
                            <input type="text" class="form-control">
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

    <script>
            CKEDITOR.replace('description', {
            language: 'en',
            height: '300'
        });
    </script>
@endpush
