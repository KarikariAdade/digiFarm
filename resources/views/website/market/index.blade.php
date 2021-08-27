@extends('layouts.main')
@section('content')
<div class="about-intro farmers">
	<div class="container">
		<h2>Our Market</h2>
		<ul class="pages-list">
			<li><a href="#" title="">Home </a></li>
			<li class="active"><span>Our Market</span></li>
		</ul>
	</div>
	<figure class="mb-5">
		<img src="{{ asset('assets/main/img/shape-b4.png') }}" class="img-fluid">
	</figure>
</div>
<section class="how_it_works container">
	<div class="text-center mb-5">
		<h1>How It Works</h1>
	</div>
	<div class="row">
		<div class="col-md-4 col-sm-4">
			<div class="working-process">
				<span class="process-img">
					<img src="assets/img/step-2.png" class="img-responsive" alt="">
					<span class="process-num">01</span>
				</span>
				<h4>Create Account</h4>
				<p>Lorem ipsum dolor amet consectetur adip- ielit sed eiusm tempor incididunt ut labore dolore magna aliqua enim ad</p>
			</div>
		</div>
        <div class="col-md-4 col-sm-4">
            <div class="working-process">
				<span class="process-img">
					<img src="assets/img/step-2.png" class="img-responsive" alt="">
					<span class="process-num">02</span>
				</span>
                <h4>Complete Profile</h4>
                <p>Lorem ipsum dolor amet consectetur adip- ielit sed eiusm tempor incididunt ut labore dolore magna aliqua enim ad</p>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <div class="working-process">
				<span class="process-img">
					<img src="assets/img/step-2.png" class="img-responsive" alt="">
					<span class="process-num">03</span>
				</span>
                <h4>Make Requests</h4>
                <p>Lorem ipsum dolor amet consectetur adip- ielit sed eiusm tempor incididunt ut labore dolore magna aliqua enim ad</p>
            </div>
        </div>
	</div>
</section>
<section class="request_category container">
	<div class="text-center mb-5 mt-5">
		<h1>Browse Requests By <span>Category</span></h1>
	</div>
	<div class="row">
		@foreach($business_type  as $business)
		<div class="col-md-3 col-sm-6">
			<div class="category-box" data-aos="fade-up">
				<div class="category-desc">
					{{--					<div class="category-icon">--}}
						{{--                        <i class="icon-briefcase" aria-hidden="true"></i>--}}
						{{--                        <i class="icon-briefcase abs-icon" aria-hidden="true"></i>--}}
					{{--                    </div>--}}
					<div class="category-detail category-desc-text">
						<h4><a href="">{{ $business->name }}</a></h4>
						<p>{{ $business->getBusiness->count() }}</p>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</section>
<section class="mb-5 mt-5" style="margin-bottom: 8% !important;">
	<div class="container">
		<div class="text-center mb-lg-5 mt-5">
			<h1>Most Popular Requests</h1>
		</div>
		<div class="row mt-5">
			@foreach($popular_requests as $popular_request)
			<div class="col-md-4 col-sm-4">
				<div class="popular-jobs-container shadow">
					<div class="popular-jobs-box">
						<span class="popular-jobs-status shadow">10 Proposals</span>
						<h4 class="flc-rate mt-3">Ghc {{ number_format($popular_request->amount, 2) }}</h4>
						<div class="popular-jobs-box">
							@if(!empty($popular_request->getBusiness->business_logo))
							<img class="img-fluid shadow" src="{{ asset($popular_request->getBusiness->business_logo) }}">
							@else
							<img class="img-fluid shadow" src="{{ asset('assets/account/img/dummy_icon.jpeg') }}">
							@endif
							<div class="popular-jobs-box-detail">
								<h4>{{ $popular_request->title }}</h4>
								<span class="desination">{{ $popular_request->getBusiness->name }}</span>
							</div>
						</div>
						<div class="popular-jobs-box-extra">
							<ul>
								<li>{{ ucwords($popular_request->product_type) }}</li>
								<li>{{ ucwords(str_replace('_', ' ', $popular_request->request_type)) }}</li>
							</ul>
							{{--                                <div>{!! $popular_request->limit() !!}</div>--}}
						</div>
					</div>
					<a href="{{ route('website.market.details', $popular_request->id) }}" class="btn btn-popular-jobs bt-1">View Detail</a>
				</div>
			</div>
			@endforeach
		</div>
		<div class="text-center mt-lg-5">
			<a href="" class="btn btn-primary header-btn">View All Market Requests</a>
		</div>
	</div>
</section>
<div class="forum-section">
    <div class="container">
        <div class="text-center pt-5 pb-5">
            <h2>Farm Related Questions Answered!</h2>
            <p>Real people are using momo to quickly and effectively run their online business. With our full suite of marketing, sales, and creation.</p>
            <a href="" class="btn btn-primary header-btn">Visit Our Forum</a>
        </div>
    </div>
</div>
@endsection
