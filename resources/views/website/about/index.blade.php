@extends('layouts.main')
@section('content')
<div class="about-intro">
	<div class="container">
		<h2>About DigiFarm</h2>
		<ul class="pages-list">
			<li><a href="#" title="">Home </a></li>
			<li class="active"><span>About Us</span></li>
		</ul>
	</div>
	<figure>
		<img src="{{ asset('assets/main/img/shape-b4.png') }}" class="img-fluid">
	</figure>
</div>
<div class="about-section">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1>Establishing Relationship <br> Between Farmers and Companies</h1>
				<p>Real people are using momo to quickly and effectively run their online business. With our full suite of marketing, sales, and creation solutions, you can focus on what matters to you most: creating content, sharing your story, and making sales.</p>
			</div>
			<div class="col-md-5">
				<figure>
					<img src="{{ asset('assets/main/img/maize.jpg') }}" class="img-fluid">
				</figure>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<figure>
					<img src="{{ asset('assets/main/img/farming.jpg') }}" class="img-fluid">
				</figure>
			</div>
		</div>
	</div>
</div>
<div class="container about-vision">
	<div class="row">
		<div class="col-md-6">
		<div class="container">
			<h4>Our Mission</h4>
			<p>Real people are using momo to quickly and effectively run their online business. With our full suite of marketing, sales, and creation solutions, you can focus on what matters to you most: creating content, sharing your story, and making sales.</p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="container">
			<h4>Our Vision</h4>
			<p>Real people are using momo to quickly and effectively run their online business. With our full suite of marketing, sales, and creation solutions, you can focus on what matters to you most: creating content, sharing your story, and making sales.</p>
		</div>
	</div>
	</div>
</div>
<div class="container about-boxes">
	<div class="row">
		<div class="col-md-4">
			<img src="{{ asset('assets/main/img/farming.jpg') }}" class="img-fluid">
		</div>
		<div class="col-md-4">
			<div class="text-data">
				<h4>Our Vision</h4>
			<p>Real people are using momo to quickly and effectively run their online business. With our full suite of marketing, sales, and creation solutions.</p>
			</div>
		</div>
		<div class="col-md-4">
			<img src="{{ asset('assets/main/img/farming.jpg') }}" class="img-fluid">
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="text-data">
				<h4>Our Vision</h4>
			<p>Real people are using momo to quickly and effectively run their online business. With our full suite of marketing, sales, and creation solutions.</p>
			</div>
		</div>
		<div class="col-md-4">
			<img src="{{ asset('assets/main/img/farming.jpg') }}" class="img-fluid">
		</div>
		<div class="col-md-4">
			<div class="text-data">
				<h4>Our Vision</h4>
			<p>Real people are using momo to quickly and effectively run their online business. With our full suite of marketing, sales, and creation solutions, </p>
			</div>
		</div>
	</div>
</div>
@endsection
