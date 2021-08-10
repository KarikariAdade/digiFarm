@extends('layouts.main')
@section('content')
<div class="about-intro farmers">
	<div class="container">
		<h2>Our Farmers</h2>
		<ul class="pages-list">
			<li><a href="#" title="">Home </a></li>
			<li class="active"><span>Our Farmers</span></li>
		</ul>
	</div>
	<figure>
		<img src="{{ asset('assets/main/img/shape-b4.png') }}" class="img-fluid">
	</figure>
</div>
<div class="container farmer-intro">
	<h1>Become a Farmer and do Business with Companies</h1>
	<p>Don’t let your harvested produce go to waste, sell your commodities to trustworthy global industry buyers by becoming a Complete Farmer Grower and farm with digiFarm.</p>
	<a href="#" title="" class="lnk-default">Become a Farmer <span class="next-btn"><i class="fa fa-arrow-right"></i></span></a>
</div>
<section class="facts-sec">
			<div class="container">
				<div class="sec-title">
					{{-- <h2>Our Some Fun Fects</h2> --}}
				</div>
				<div class="facts-row">
					<div class="fact-col">
						<h3>Sign Up</h3>
						<h2>12<span>K</span></h2>
					</div>
					<div class="fact-col">
						<h3>Add Farm</h3>
						<h2>15<span>K</span></h2>
						<span>+</span>
					</div>
					<div class="fact-col">
						<h3>Meet Buyers</h3>
						<h2><small>$</small>15<span>M</span></h2>
					</div>
					<div class="fact-col">
						<h3>Do Business</h3>
						<h2><small>$</small>15<span>M</span></h2>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</section>
@endsection
