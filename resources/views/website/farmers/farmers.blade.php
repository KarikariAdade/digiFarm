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
    <div class="container">
        <div class="row">
            @foreach($farmers as $farmer)
            <div class="col-md-4">
            <div class="grid-view brows-job-list">

                <div class="pt-4">
                    @if($farmer->avatar)
                    <img src="{{ asset($farmer->avatar) }}" class="img-responsive brows-job-company-img" alt="">
                    @endif
                </div>

                <div class="brows-job-position">
                    <h3><a href="#">{{ $farmer->name }}</a></h3>
                    <p>
                        @for($i = 1; $i < number_format($farmer->avgRating(), 1); $i++)
                            <i class="fas fa-star text-warning filled"></i>
                        @endfor
                    </p>
                </div>
                <div class="job-position">
                    <span class="job-num">{{ $farmer->getFarms->count() }} Farms</span>
                </div>
                <ul class="grid-view-caption">
                    <li>
                        <div class="brows-job-location">
                            <p><i class="fa fa-map-marker-alt"></i> {{ $farmer->address }}</p>
                        </div>
                    </li>
                    <li>
                        <p><span class="brows-job-sallery">{{ $farmer->getReviews->count() }} Review(s)</span></p>
                    </li>
                </ul>
            </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
