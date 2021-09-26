@extends('layouts.farmer')
@section('content')
    <section>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-success">
                        <i class="fas fa-truck-moving"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4 class="">Total Farms</h4>
                        </div>
                        <div class="card-body ">
                            {{ auth()->user()->getFarms->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-success">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4 class="">Total Clients</h4>
                        </div>
                        <div class="card-body ">
                            {{ auth()->user()->getClients->count() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-statistic-2">
                    <div class="card-icon shadow-primary bg-success">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4 class="">Sent Proposals</h4>
                        </div>
                        <div class="card-body">
                            {{ auth()->user()->getProposals->count() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="section">
        <div class="row">
            <div class="col-md-6 col-lg-12 col-xl-6">
                <!-- Support tickets -->
                <div class="card">
                    <div class="card-header">
                        <h4>Most Recent Reviews</h4>
                    </div>
                    <div class="card-body">
                        @foreach($recent_reviews as $review)
                        <div class="support-ticket media pb-1 mb-3">
                            <img src="{{ asset($review->getBusiness->business_logo) }}" style="height: 50px; width:50px;" class="user-img mr-2" alt="">
                            <div class="media-body ml-3">
                                <div class="badge badge-pill mb-1 float-right">
                                    @for($i = 1; $i < number_format($review->rating, 1); $i++)
                                        <i class="fas fa-star text-warning filled"></i>
                                    @endfor
                                </div>
                                <a href="javascript:void(0)">{{ $review->title }}</a>
                                <p class="my-1">{{ $review->message }}</p>
                                <small class="text-muted">Reviewed by <span class="font-weight-bold font-13">{{ $review->getBusiness->name }}</span>
                                    &nbsp;&nbsp; {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
{{--                    <a href="javascript:void(0)" class="card-footer card-link text-center small ">View--}}
{{--                        All</a>--}}
                </div>
                <!-- Support tickets -->
            </div>
            <div class="col-md-6 col-lg-12 col-xl-6">
                <!-- Support tickets -->
                <div class="card">
                    <div class="card-header">
                        <h4>Recently Approved Proposals</h4>
                    </div>
                    <div class="card-body">
                        @foreach($approved_proposals as $proposal)
                        <div class="support-ticket media pb-1 mb-3">
                            <img src="{{ asset($proposal->getBusiness->business_logo) }}" style="height: 50px; width:50px;"  class="user-img mr-2" alt="">
                            <div class="media-body ml-3">
                                <div class="badge badge-pill badge-success mb-1 float-right">GHS {{ number_format($proposal->price_quote, 2) }}</div>
                                <a href="javascript:void(0)">{{ $proposal->getRequest->title }}</a>
                                <p class="my-1">Proposal Message: {{ $proposal->message }}</p>
                                <small class="text-muted">Sent to <span class="font-weight-bold font-13">{{ $proposal->getBusiness->name }}</span>
                                    &nbsp;&nbsp; {{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</small>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{--                    <a href="javascript:void(0)" class="card-footer card-link text-center small ">View--}}
                    {{--                        All</a>--}}
                </div>
                <!-- Support tickets -->
            </div>
        </div>
    </div>
@endsection
