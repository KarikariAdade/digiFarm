@extends('layouts.business')
@section('content')
    <div class="row">
        <div class="col-md-3">
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
        <div class="col-md-3">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-success">
                    <i class="fas fa-comment-dots"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4 class="">Received Proposals</h4>
                    </div>
                    <div class="card-body ">
                        {{ auth()->user()->getProposals->count() }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-success">
                    <i class="fas fa-clipboard"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4 class="">Requests</h4>
                    </div>
                    <div class="card-body ">
                        {{ $user->getMarketRequests->count() ?? 0 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-statistic-2">
                <div class="card-icon shadow-primary bg-success">
                    <i class="fas fa-clipboard-check"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4 class="">Approved Requests</h4>
                    </div>
                    <div class="card-body ">
                        {{ $user->getApprovedRequests() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="row">
                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Recently Received Proposals</h4>
                        </div>
                        <div class="card-body">
                            @foreach($proposals as $proposal)
                                <div class="support-ticket media pb-1 mb-3">
                                    <img src="{{ asset($proposal->getUser->avatar) }}" style="height: 50px; width:50px;"  class="user-img mr-2" alt="">
                                    <div class="media-body ml-3">
                                        <div class="badge badge-pill badge-success mb-1 float-right">GHS {{ number_format($proposal->price_quote, 2) }}</div>
                                        <a href="{{ $proposal->getBusinessDashboardUrl() }}">{{ $proposal->getRequest->title }}</a>
                                        <p class="my-1">Proposal Message: {{ $proposal->message }}</p>
                                        <small class="text-muted">Received from: <span class="font-weight-bold font-13">{{ $proposal->getUser->name }}</span>
                                            &nbsp;&nbsp; {{ \Carbon\Carbon::parse($proposal->created_at)->diffForHumans() }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{--                    <a href="javascript:void(0)" class="card-footer card-link text-center small ">View--}}
                        {{--                        All</a>--}}
                    </div>

                </div>
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>New Clients</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled user-details list-unstyled-border list-unstyled-noborder">
                            @foreach($clients as $client)
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" style="height: 50px; width:50px;" src="{{ asset($client->getUser->avatar) }}">
                                <div class="media-body">
                                    <div class="media-title"><a href="{{ route('business.dashboard.client.detail', $client->getUser->id) }}">{{ $client->getUser->name }}</a></div>
                                    <div class="text-job text-muted">{{ $client->getUser->city.', '.$client->getUser->getRegion->name }}</div>
                                </div>
                                <div class="media-items">
                                    <div class="media-item">
                                        <div class="media-value">{{ $client->getUser->getFarms->count() }}</div>
                                        <div class="media-label">Farms</div>
                                    </div>
                                    <div class="media-item" style="width: 200px;">
                                        <div class="media-value">
                                            @for($i = 1; $i < number_format($client->getUser->avgRating(), 1); $i++)
                                                <i class="fas fa-star text-warning filled"></i>
                                            @endfor
                                        </div>
                                        <div class="media-label">Rating</div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
