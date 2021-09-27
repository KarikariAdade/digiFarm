@extends('layouts.main')
@section('content')
    <section class="inner-header-page mb-5">
        <div class="container">
            <h2>{{ $count_market }} Requests Found</h2>
            <p>Some random text can be put here</p>
        </div>
    </section>
    <section class="container">
        <form class="row"></form>
        <div class="row">
            @foreach($markets as $market)
            <div class="col-md-4 col-sm-4">
                <div class="popular-jobs-container shadow">
                    <div class="popular-jobs-box">
                        <span class="popular-jobs-status shadow">{{ $market->getProposals()->count() }} Proposals</span>
                        <div class="popular-jobs-box">
                            @if(!empty($market->getBusiness->business_logo))
                                <img class="img-fluid shadow" src="{{ asset($market->getBusiness->business_logo) }}">
                            @else
                                <img class="img-fluid shadow" src="{{ asset('assets/account/img/dummy_icon.jpeg') }}">
                            @endif
                            <div class="popular-jobs-box-detail">
                                <h4>{{ $market->title }}</h4>
                                <span class="desination">{{ $market->getBusiness->name }}</span>
                            </div>
                        </div>
                        <div class="popular-jobs-box-extra">
                            <ul>
                                <li>{{ ucwords(str_replace('_', ' ', $market->product_type)) }}</li>
                                <li>{{ ucwords(str_replace('_', ' ', $market->request_type)) }}</li>
                            </ul>
                            {{--                                <div>{!! $market->limit() !!}</div>--}}
                        </div>
                    </div>
                    <a href="{{ $market->requestUrl() }}" class="btn btn-popular-jobs bt-1">View Detail</a>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row text-center">
{{--            {{ $markets->links('vendor.pagination.simple-bootstrap-4') }}--}}
            {{ $markets->links('vendor.pagination.simple-bootstrap-4') }}
        </div>
    </section>
@endsection
