@extends('layouts.business')
@push('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/account/bundles/bootstrap-social/bootstrap-social.css') }}">
    <style>
        .alert.alert-danger, .alert.alert-success{
            color: #fff !important;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if($client->getUser->avatar)
                        <img alt="image" src="{{ asset($client->getUser->avatar) }}" class="rounded-circle profile-widget-picture">
                        @endif
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Country</div>
                                <div class="profile-widget-item-value">{{ $client->getUser->getCountry->name }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Region</div>
                                <div class="profile-widget-item-value">{{ $client->getUser->getRegion->name }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">City</div>
                                <div class="profile-widget-item-value">{{ $client->getUser->city }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description pb-0">
                        <div class="profile-widget-name">{{ $client->getUser->name }} <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> {{ $client->getUser->email }}
                            </div>
                        </div>
                        <p>{{ $client->getUser->description }}</p>
                    </div>
                    <div class="card-footer text-center pt-0">
                        <div class="font-weight-bold mb-2 text-small">Follow {{ $client->getUser->name }} On</div>
                        @if(!empty($client->getUser->getSocials->instagram))
                            <a href="{{ $client->getUser->getSocials->instagram }}" class="btn btn-social-icon mr-1 btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if(!empty($client->getUser->getSocials->twitter))
                            <a href="{{ $client->getUser->getSocials->twitter }}" class="btn btn-social-icon mr-1 btn-twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(!empty($client->getUser->getSocials->linkedin))
                            <a href="{{ $client->getUser->getSocials->linkedin }}" class="btn btn-social-icon mr-1 btn-linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                        @if(!empty($client->getUser->getSocials->facebook))
                            <a href="{{ $client->getUser->getSocials->facebook }}" class="btn btn-social-icon mr-1 btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card card-success">
                    <div class="card-header" style="text-align: center !important; display: inline !important;">
                        <h4 class="">Address Details</h4>
                    </div>
                    <div class="card-body">
                        <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Phone
                                          </span>
                            <span class="float-right f-bold">
                                              {{ $client->getUser->phone }}
                                          </span>
                        </p>
                        <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              No. of Farms
                                          </span>
                            <span class="float-right f-bold">
                                              {{ $client->getUser->getFarms->count() }}
                                          </span>
                        </p>
                        <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Rating
                                          </span>
                            <span class="float-right f-bold">
                                                @for($i = 1; $i < number_format($client->getUser->avgRating(), 1); $i++)
                                    <i class="fas fa-star text-warning filled"></i>
                                @endfor
                                          </span>
                        </p>
                        <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Reviews
                                          </span>
                            <span class="float-right f-bold">
{{ $client->getUser->getReviews->count() }}
                                          </span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Statistics</h4>
                    </div>
                    <div class="card-body">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Farms</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 table-responsive p-3">
                            {!! $dataTable->table(['class' => 'table table-hover table-striped']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="row">
            <div class="col-md-7">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Reviews</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                            @foreach($client->getUser->paginateReview() as $review)
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" style="width:50px; height: 50px;" src="{{ asset($review->getBusiness->business_logo) }}">
                                <div class="media-body">
                                    <div class="media-title mb-1">
                                        {{ $review->getBusiness->name }}
                                        <div>
                                            @for($i = 1; $i < number_format($review->rating, 1); $i++)
                                                <i class="fas fa-star text-warning filled"></i>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="text-time">{{ $review->getDateDiff() }}</div>
                                    <div class="media-description text-muted">{{ $review->message }}</div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        {{ $client->getUser->paginateReview()->links('vendor.pagination.bootstrap-4') }}
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Write a review for {{ $client->getUser->name }}</h4>
                    </div>
                    <div class="card-body">
                        <!-- Write Review Form -->
                        <form method="POST" action="{{ route('business.dashboard.client.review.create', $client->getUser->id) }}" class="review_form">
                            @csrf
                            @method('POST')
                            @include('layouts.errors')
                            <div class="form-group">
                                <label>Rating</label>
                                <div class="star-rating">
                                    <input id="star-5" type="radio" name="rating" value="5">
                                    <label for="star-5" title="5 stars">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                    <input id="star-4" type="radio" name="rating" value="4">
                                    <label for="star-4" title="4 stars">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                    <input id="star-3" type="radio" name="rating" value="3">
                                    <label for="star-3" title="3 stars">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                    <input id="star-2" type="radio" name="rating" value="2">
                                    <label for="star-2" title="2 stars">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                    <input id="star-1" type="radio" name="rating" value="1">
                                    <label for="star-1" title="1 star">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Title of your review</label>
                                <input class="form-control" type="text" name="title">
                            </div>
                            <div class="form-group">
                                <label>Your review</label>
                                <textarea id="review_desc" maxlength="100" name="description" class="form-control"></textarea>
                                <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">300</span> characters remaining</small></div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-success submit-btn">Add Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('custom-js')
    {!! $dataTable->scripts() !!}
    <script src="{{ asset('assets/account/bundles/apexcharts/apexcharts.min.js') }}"></script>
    <script>
        var options = {
            series: [{
                data: [{
                    "date": "2014-01-01",
                    "value": 20000000
                },
                    {
                        "date": "2014-01-02",
                        "value": 10379978
                    },
                    {
                        "date": "2014-01-03",
                        "value": 30493749
                    },
                    {
                        "date": "2014-01-04",
                        "value": 10785250
                    },
                    {
                        "date": "2014-01-05",
                        "value": 33901904
                    },
                    {
                        "date": "2014-01-06",
                        "value": 11576838
                    },
                    {
                        "date": "2014-01-07",
                        "value": 14413854
                    },
                    {
                        "date": "2014-01-08",
                        "value": 15177211
                    },
                    {
                        "date": "2014-01-09",
                        "value": 16622100
                    },
                    {
                        "date": "2014-01-10",
                        "value": 17381072
                    },
                    {
                        "date": "2014-01-11",
                        "value": 18802310
                    },
                    {
                        "date": "2014-01-12",
                        "value": 15531790
                    },
                    {
                        "date": "2014-01-13",
                        "value": 15748881
                    },
                    {
                        "date": "2014-01-14",
                        "value": 18706437
                    },
                    {
                        "date": "2014-01-15",
                        "value": 19752685
                    },
                    {
                        "date": "2014-01-16",
                        "value": 21016418
                    },
                    {
                        "date": "2014-01-17",
                        "value": 25622924
                    },
                    {
                        "date": "2014-01-18",
                        "value": 25337480
                    },]
            }],
            chart: {
                height: 350,
                type: 'line',
                id: 'areachart-2'
            },
            annotations: {
                yaxis: [{
                    y: 8200,
                    borderColor: '#00E396',
                    label: {
                        borderColor: '#00E396',
                        style: {
                            color: '#fff',
                            background: '#00E396',
                        },
                        text: 'Support',
                    }
                }, {
                    y: 8600,
                    y2: 9000,
                    borderColor: '#000',
                    fillColor: '#FEB019',
                    opacity: 0.2,
                    label: {
                        borderColor: '#333',
                        style: {
                            fontSize: '10px',
                            color: '#333',
                            background: '#FEB019',
                        },
                        text: 'Y-axis range',
                    }
                }],
                xaxis: [{
                    x: new Date('23 Nov 2017').getTime(),
                    strokeDashArray: 0,
                    borderColor: '#775DD0',
                    label: {
                        borderColor: '#775DD0',
                        style: {
                            color: '#fff',
                            background: '#775DD0',
                        },
                        text: 'Anno Test',
                    }
                }, {
                    x: new Date('26 Nov 2017').getTime(),
                    x2: new Date('28 Nov 2017').getTime(),
                    fillColor: '#B3F7CA',
                    opacity: 0.4,
                    label: {
                        borderColor: '#B3F7CA',
                        style: {
                            fontSize: '10px',
                            color: '#fff',
                            background: '#00E396',
                        },
                        offsetY: -10,
                        text: 'X-axis range',
                    }
                }],
                points: [{
                    x: new Date('01 Dec 2017').getTime(),
                    y: 8607.55,
                    marker: {
                        size: 8,
                        fillColor: '#fff',
                        strokeColor: 'red',
                        radius: 2,
                        cssClass: 'apexcharts-custom-class'
                    },
                    label: {
                        borderColor: '#FF4560',
                        offsetY: 0,
                        style: {
                            color: '#fff',
                            background: '#FF4560',
                        },

                        text: 'Point Annotation',
                    }
                }, {
                    x: new Date('08 Dec 2017').getTime(),
                    y: 9340.85,
                    marker: {
                        size: 0
                    },
                    image: {
                        path: '../../assets/images/ico-instagram.png'
                    }
                }]
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            grid: {
                padding: {
                    right: 30,
                    left: 20
                }
            },
            title: {
                text: 'Line with Annotations',
                align: 'left'
            },
            labels: [{
                "date": "2014-01-01",
                "value": 20000000
            },
                {
                    "date": "2014-01-02",
                    "value": 10379978
                },
                {
                    "date": "2014-01-03",
                    "value": 30493749
                },
                {
                    "date": "2014-01-04",
                    "value": 10785250
                },
                {
                    "date": "2014-01-05",
                    "value": 33901904
                },
                {
                    "date": "2014-01-06",
                    "value": 11576838
                },
                {
                    "date": "2014-01-07",
                    "value": 14413854
                },
                {
                    "date": "2014-01-08",
                    "value": 15177211
                },
                {
                    "date": "2014-01-09",
                    "value": 16622100
                },
                {
                    "date": "2014-01-10",
                    "value": 17381072
                },
                {
                    "date": "2014-01-11",
                    "value": 18802310
                },
                {
                    "date": "2014-01-12",
                    "value": 15531790
                },
                {
                    "date": "2014-01-13",
                    "value": 15748881
                },
                {
                    "date": "2014-01-14",
                    "value": 18706437
                },
                {
                    "date": "2014-01-15",
                    "value": 19752685
                },
                {
                    "date": "2014-01-16",
                    "value": 21016418
                },
                {
                    "date": "2014-01-17",
                    "value": 25622924
                },
                {
                    "date": "2014-01-18",
                    "value": 25337480
                },],
            xaxis: {
                type: 'datetime',
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

    </script>
@endpush
