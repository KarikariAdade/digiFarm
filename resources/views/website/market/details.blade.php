@extends('layouts.main')
@section('content')
    <section class="inner-header-page">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                <div class="left-side-container">
                    <div class="freelance-image">
                        @if(!empty($request->getBusiness->business_logo))
                        <a href="">
                            <img src="{{ asset($request->getBusiness->business_logo) }}" class="img-responsive" alt="">
                        </a>
                        @else
                            <a href="">
                                <img src="{{ asset('assets/account/img/dummy_icon.jpeg') }}" class="img-responsive" alt="">
                            </a>
                        @endif
                    </div>
                    <div class="header-details">
                        <h4>{{ $request->title }}</h4>
                        <p>{{ $request->getBusiness->name }} <span class="fa fa-check-circle text-success"></span></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> {{ $request->getProposals->count() }} Proposals</a></li>
                            <li> {{ $request->getBusiness->city.', '.$request->getBusiness->getRegion->name.', '. $request->getBusiness->getCountry->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 bl-1 br-gary">
                <div class="right-side-detail">
                    <ul>
                        <li><span class="detail-info">Product Type</span>{{ ucwords(str_replace('_', ' ', $request->product_type))  }}</li>
                        <li><span class="detail-info">Request Type</span>{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</li>
                        <li><span class="detail-info">Quantity</span>{{ $request->quantity }}</li>
{{--                        <li><span class="detail-info">Amount</span> {{ 'GHS '. number_format($request->amount, 2) }}</li>--}}
                        <li><span class="detail-info">Due Date</span> {{ date('l M d, Y', strtotime($request->due_date)) }}</li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class="container mt-lg-5 mb-lg-5">
        <div class="row">
            <div class="col-md-8">
                <div class="container-detail-box">

                    <div class="apply-job-header">
                        <h4 class="mb-4">{{ $request->title }}</h4>
                        <span><i class="fa fa-map-marker-alt"></i> {{ $request->getBusiness->city.', '.$request->getBusiness->getRegion->name.', '. $request->getBusiness->getCountry->name }}</span>
                    </div>
                    <div class="apply-job-detail">
                        {!! $request->description !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 container-detail-box">
                <div class="text-center mb-3">
                    <h3>Submit Proposal</h3>
                </div>
                @if(auth()->user() !== null)
                <form class="" method="POST" action="{{ $request->submitProposalLink() }}">
                    @csrf
                    @method('POST')
                    @include('layouts.errors')
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control mt-2" name="email" value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-group">
                        <label>Phone <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control mt-2" name="phone" value="{{ auth()->user()->phone }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label style="margin-bottom: 10px;">Measurement Unit <span class="text-danger">*</span></label>
                            <select name="measurement_unit" class="form-control mt-2 select2">
                                <option>{{ old('quantity_type') }}</option>
                                <option>Kilograms (Kgs)</option>
                                <option>Pounds (lbs)</option>
                                <option>Tonnes</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Quantity Available <span class="text-danger">*</span></label>
                            <input type="number" class="form-control mt-2" name="quantity" value="{{ old('quantity') }}">
                        </div>
                        <div class="col-md-7 mt-3 form-group">
                            <label>Price Quote (GHS) <span class="text-danger">*</span></label>
                            <input type="number" step="0.1" class="form-control mt-2" name="price_quote" value="{{ old('quote') }}">
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn header-btn">Submit Proposal</button>
                    </div>
                </form>
                @else
                <div class="bg-amber">
                    <h5>Please <a href="{{ route('login') }}" target="_blank" class="text-success">create account or login</a> to submit your proposal</h5>
                </div>
                @endif
            </div>
        </div>
        <div class="text-center">
            <a href="{{ route('website.market.list') }}" class="header-btn btn">View All Requests</a>
        </div>
    </section>
@endsection
