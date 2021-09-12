@extends('layouts.farmer')
@section('content')
    <div class="card card-success">
        <div class="card-body">
            <div class="text-center">
                <h3 class="mb-4">Request For Bananas</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>TITLE / NAME</b></td><td class="f-bold">{{ $request->title }}</td></tr>
                            <tr><td style="width: 200px;"><b>REQUEST TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</td></tr>
                            <tr><td style="width: 200px;"><b>PRODUCT TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $request->product_type)) }}</td></tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tbody>
                            <tr><td style="width: 200px;"><b>QUANTITY</b></td><td class="f-bold">{{ $request->quantity }}</td></tr>
                            <tr><td style="width: 200px;"><b>DUE DATE</b></td><td class="f-bold">{{ date('l M d, Y', strtotime($request->due_date)) }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tbody><tr><td style="width: 200px;"><b>DESCRIPTION</b></td><td class="f-bold"><p>This is the description</p></td></tr>
                            </tbody></table>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
    <section class="container">
        <div class="row">
            @if($check_request)
                <div class="col-md-7 card card-success">
                    <div class="card-header">
                        <h4>Submitted Proposal</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>MEASUREMENT UNIT</b></td><td class="f-bold">{{ $check_request->measurement_unit }}</td></tr>
                            <tr><td style="width: 200px;"><b>QUANTITY</b></td><td class="f-bold">{{ $check_request->quantity.' '.$check_request->measurement_unit }}</td></tr>
                            <tr><td style="width: 200px;"><b>PRICE QUOTE</b></td><td class="f-bold">{{ 'GHS '. number_format($check_request->price_quote, 2) }}</td></tr>
                            <tr><td style="width: 200px;"><b>EMAIL</b></td><td class="f-bold">{{ $check_request->email }}</td></tr>
                            <tr><td style="width: 200px;"><b>PHONE</b></td><td class="f-bold">{{ $check_request->phone }}</td></tr>
                        </table>
                    </div>
                </div>
            @else
            <div class="col-md-7 card card-success">
                <div class="card-header">
                    <h4>Submit Proposal</h4>
                </div>
                <div class="card-body">
                    @include('layouts.errors')
                    <form class="row" method="POST" action="{{ $request->submitProposalLink() }}">
                        @csrf
                        @method('POST')
                        <div class="form-group col-md-6">
                            <label>Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control mt-2" name="email" value="{{ auth()->user()->email ?? old('email') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" name="phone" value="{{ auth()->user()->phone ?? old('phone') }}">
                        </div>
                            <div class="col-md-4 form-group">
                                <label>Measurement Unit <span class="text-danger">*</span></label>
                                <select name="measurement_unit" class="form-control select2">
                                    <option></option>
                                    <option>Kilograms (Kgs)</option>
                                    <option>Pounds (lbs)</option>
                                    <option>Tonnes</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Quantity Available <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}">
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Price Quote (GHS) <span class="text-danger">*</span></label>
                                <input type="number" step="0.1" class="form-control" name="price_quote" value="{{ old('price_quote') }}">
                            </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">Submit Proposal</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </section>

@endsection
