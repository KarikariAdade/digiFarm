@extends('layouts.business')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form class="" method="POST" action="{{ route('business.dashboard.request.store') }}">
                    @method('POST')
                    @csrf
                <div class="submit-section mb-4" align="right">
                    <button class="btn btn-success btn-round" type="submit" name="save" value="save"> Save </button>
                    <button class="btn btn-success btn-round" type="submit" name="save" value="save_and_apply"> Save & Apply</button>
                </div>
                    <div class="form-row"></div>
                @include('layouts.errors')
                <div class="row">
                    <div class="col-md-4 form-group">
                        <label>Request Title / Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Request (Name of Item Needed) *">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Due Date (Expected date for products) <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="due_date">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Request Type <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="request_type">
                            <option value="produced_goods">Produced Goods</option>
                            <option value="pending_production">Pending Production</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Product Type <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="product_type">
                            <option></option>
                            <option value="crop_product">Crop Product</option>
                            <option value="animal_product">Animal Product</option>
                            <option value="both">Both</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Required Quantity <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="quantity" placeholder="10 bags / 300 lbs etc">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Amount (Cash Value) <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="amount">
                    </div>
                    <div class="col-md-12">
                        <label>Description / Others</label>
                        <textarea name="description" class="form-control" id="description"></textarea>
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
        CKEDITOR.replace('description', {
            language: 'en',
            height: '300'
        });
    </script>
@endpush
