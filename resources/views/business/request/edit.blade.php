@extends('layouts.business')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form class="" method="POST" action="{{ route('business.dashboard.request.update', $request) }}">
                    @method('PATCH')
                    @csrf
                    <div class="submit-section mb-4" align="right">
                        <button class="btn btn-success btn-round" type="submit" name="save" value="save"> Update </button>
                        <button class="btn btn-success btn-round" type="submit" name="save" value="save_and_apply"> Update & Apply</button>
                    </div>
                    <div class="form-row"></div>
                    @include('layouts.errors')
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <label>Request Title / Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" placeholder="Request (Name of Item Needed) *" value="{{ old('title') ?? $request->title }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Due Date (Expected date for products) <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="due_date" value="{{ old('due_date') ?? $request->due_date }}">
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Request Type <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="request_type">
                                <option value="produced_goods">{{ old('request_type') === 'produced_goods' || $request->request_type === 'produced_goods' ? ucfirst(str_replace('_', ' ', $request->request_type)) : 'Produced Goods' }}</option>
                                <option value="pending_production">{{ old('request_type') === 'pending_production' || $request->request_type === 'pending_production' ? ucfirst(str_replace('_', ' ', $request->request_type)) : 'Pending Production' }}</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Product Type <span class="text-danger">*</span></label>
                            <select class="form-control select2" name="product_type">
                                <option>{{ old('product_type') ?? ucfirst(str_replace('_', ' ', $request->product_type))}}</option>
                                <option value="crop_product">Crop Product</option>
                                <option value="animal_product">Animal Product</option>
                                <option value="both">Both</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Required Quantity <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="quantity" placeholder="10 bags / 300 lbs etc" value="{{ old('quantity') ?? $request->quantity }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Amount (Cash Value) <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="amount" value="{{ old('amount') ?? $request->amount }}">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Status</label>
                            <select class="form-control select2" name="status">
                                <option value="{{ $request->is_approved != false ? 'approve' : 'pending' }}">{{ $request->is_approved != false ? 'Approved' : 'Pending' }}</option>
                                <option value="approve">Approved</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Description / Others</label>
                            <textarea name="description" class="form-control" id="description"> {{ old('description') ?? $request->description }}</textarea>
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
