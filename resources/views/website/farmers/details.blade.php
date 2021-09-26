@extends('layouts.main')
@push('extra-css')
    <link href="{{ asset('assets/main/css/custom.css') }}">
@endpush
@section('content')
    <section class="inner-header-page">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="left-side-container">
                        <div class="freelance-image">
                            @if(!empty($farmer->avatar))
                                <a href="">
                                    <img src="{{ asset($farmer->avatar) }}" class="img-responsive" alt="">
                                </a>
                            @else
                                <a href="">
                                    <img src="{{ asset('assets/account/img/dummy_icon.jpeg') }}" class="img-responsive" alt="">
                                </a>
                            @endif
                        </div>
                        <div class="header-details">
                            <h4>{{ $farmer->name }}</h4>
                            <p>{{ $farmer->email }} <span class="fa fa-check-circle text-success"></span></p>
                            <ul>
                                <li><a href="#"><i class="fa fa-phone-alt"></i> {{ $farmer->phone }}</a></li><br>
                                <li>
                                    @for($i = 1; $i < number_format($farmer->avgRating(), 1); $i++)
                                        <i class="fas fa-star text-warning filled"></i>
                                    @endfor
                                </li>
                                <li><a href="#"><i class="fa fa-user"></i> {{ $farmer->getReviews->count() }} Reviews</a></li><br>

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 bl-1 br-gary">
                    <div class="right-side-detail">
                        <ul>
                            <li><span class="detail-info">Region</span>{{ $farmer->getRegion->name }}</li>
                            <li><span class="detail-info">City</span>{{ $farmer->city }}</li>
                            <li><span class="detail-info">Reviews</span> {{ $farmer->getReviews->count() }} Review(s)</li>
                            <li><span class="detail-info">Farms</span>{{ $farmer->getFarms->count()  }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container-detail-box">

        <div class="apply-job-header">
            <h4 class="mb-4">Reviews</h4>
            <span><svg class="svg-inline--fa fa-map-marker-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="map-marker-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path></svg><!-- <i class="fa fa-map-marker-alt"></i> --> Agona, Ashanti, Ghana</span>
        </div>
        <div class="apply-job-detail">
            <div class="widget review-listing">
                <ul class="comments-list">
                    <!-- Comment List -->
                    <li>
                        <div class="comment">
                            <img class="avatar avatar-sm rounded-circle" alt="User Image" src="assets/img/patients/patient.jpg">
                            <div class="comment-body">
                                <div class="meta-data">
                                    <span class="comment-author">Bizzle</span>
                                    <span class="comment-date">Reviewed 6 months ago </span>
                                    <div class="review-count rating" style="float: right;">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                    </div>
                                </div>
                                <p class="recommended"><i class="far fa-thumbs-up"></i> A very good doctor part 2</p>
                                <p class="comment-content">
                                    This is the description stuff
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="comment">
                            <img class="avatar avatar-sm rounded-circle" alt="User Image" src="assets/img/patients/patient.jpg">
                            <div class="comment-body">
                                <div class="meta-data">
                                    <span class="comment-author">Bizzle</span>
                                    <span class="comment-date">Reviewed 6 months ago </span>
                                    <div class="review-count rating" style="float: right;">
                                        <i class="fas fa-star filled"></i>
                                        <i class="fas fa-star filled"></i>
                                    </div>
                                </div>
                                <p class="recommended"><i class="far fa-thumbs-up"></i> A very good doctor</p>
                                <p class="comment-content">
                                    This is the description stuff
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- Show All -->
                <!-- /Show All -->
            </div>
        </div>
    </div>
@endsection
