@extends('layouts.main')
@section('content')
    <section class="inner-header-page">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                <div class="left-side-container">
                    <div class="freelance-image"><a href=""><img src="{{ asset($request->getBusiness->business_logo) }}" class="img-responsive" alt=""></a></div>
                    <div class="header-details">
                        <h4>{{ $request->title }}</h4>
                        <p>{{ $request->getBusiness->name }} <span class="fa fa-check-circle text-success"></span></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> 7 Applications</a></li>
                            <li> {{ $request->getBusiness->city.', '.$request->getBusiness->getRegion->name.', '. $request->getBusiness->getCountry->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4 bl-1 br-gary">
                <div class="right-side-detail">
                    <ul>
                        <li><span class="detail-info">Product Type</span>{{ ucwords($request->product_type)  }}</li>
                        <li><span class="detail-info">Request Type</span>{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</li>
                        <li><span class="detail-info">Quantity</span>{{ $request->quantity }}</li>
                        <li><span class="detail-info">Amount</span> {{ 'GHS '. number_format($request->amount, 2) }}</li>
                    </ul>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection
