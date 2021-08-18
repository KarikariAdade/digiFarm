@extends('layouts.business')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <form class="row" method="POST" action="{{ route('business.dashboard.request.store') }}">
                    @method('POST')
                    @csrf
                    <div class="col-md-4 form-group">
                        <label>Request Title / Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" placeholder="Request name (Items Needed) *">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Due Date (Expected date for products) <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="">
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Request Type <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="product_type">
                            <option>Produced Goods</option>
                            <option>Pending Production</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Product Type <span class="text-danger">*</span></label>
                        <select class="form-control select2" name="product_type">
                            <option></option>
                            <option>Crop Product</option>
                            <option>Animal Product</option>
                            <option>Both</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label>Required Quantity <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="" placeholder="10 bags / 300 lbs etc">
                    </div>
                    <div class="col-md-12">
                        <label>Description / Others</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
