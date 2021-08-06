@extends('layouts.main')
@push('extra-css')
<style type="text/css">
body{
    height: 210vh;
}
</style>
@endpush
@section('content')
<div class="farm-intro">
    <div class="container">
        <div class="row">
            <div class="col-md-5 text-center">
                <div class="">
                    <h2>Welcome to DigiFarm</h2>
                    <h4>
                        Farm and Trade directly with trusted buyers and Food Growers from around the world.
                    </h4>
                </div>
            </div>
            <div class="col-md-7 text-center">
                <img src="{{ asset('assets/main/img/farm.svg') }}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
<div class="homepage-features">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="feature-col">
                    <img class="fl-icon img-fluid" src="{{ asset('assets/main/img/farm.png') }}">
                    <h3><a href="" title="">Farm</a></h3>
                    <p>Duis dolor in reprehenderit <br> in voluptate velit esse cillum dolore fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, </p>
                    <a href="service-details.html" title="" class="rm-btn"><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-col" id="middle-col">
                    <img class="fl-icon img-fluid" src="{{ asset('assets/main/img/market.png') }}">
                    <h3><a href="" title="">Market</a></h3>
                    <p>Duis dolor in reprehenderit <br> in voluptate velit esse cillum dolore fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, </p>
                    <a href="service-details.html" title="" class="rm-btn"><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-col">
                    <img class="fl-icon img-fluid" src="{{ asset('assets/main/img/forum.png') }}">
                    <h3><a href="" title="">Forum</a></h3>
                    <p>Duis dolor in reprehenderit <br> in voluptate velit esse cillum dolore fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, </p>
                    <a href="service-details.html" title="" class="rm-btn"><i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class=" farm-features text-center">
    <div class="container">
    <div class="row">
        <div class="col-md-5">
            <h2>Find a Farm that Suits your Needs</h2>
            <h5>
                Real people are using momo to quickly and effectively run their online business. With our full suite of marketing, sales, and creation solutions, you can focus on what matters to you most: creating content, sharing your story, and making sales.
            </h5><br>
            <a href="" class="btn btn-primary header-btn">Request Farm Produce</a>
        </div>
        <div class="col-md-7">
            <figure>
                <img src="{{ asset('assets/main/img/market.svg') }}">
            </figure>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6"></div>
    </div>
</div>
</div>
@endsection


