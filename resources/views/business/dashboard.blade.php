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
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-1.png">
                                <div class="media-body">
                                    <div class="media-title">Cara Stevens</div>
                                    <div class="text-job text-muted">Web Developer</div>
                                </div>
                                <div class="media-items">
                                    <div class="media-item">
                                        <div class="media-value">1,239</div>
                                        <div class="media-label">Posts</div>
                                    </div>
                                    <div class="media-item">
                                        <div class="media-value">10K</div>
                                        <div class="media-label">Followers</div>
                                    </div>
                                    <div class="media-item">
                                        <div class="media-value">2,312</div>
                                        <div class="media-label">Following</div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-5.png">
                                <div class="media-body">
                                    <div class="media-title">Ashton Cox</div>
                                    <div class="text-job text-muted">Web Developer</div>
                                </div>
                                <div class="media-items">
                                    <div class="media-item">
                                        <div class="media-value">4,872</div>
                                        <div class="media-label">Posts</div>
                                    </div>
                                    <div class="media-item">
                                        <div class="media-value">43K</div>
                                        <div class="media-label">Followers</div>
                                    </div>
                                    <div class="media-item">
                                        <div class="media-value">1,290</div>
                                        <div class="media-label">Following</div>
                                    </div>
                                </div>
                            </li>
                            <li class="media">
                                <img alt="image" class="mr-3 rounded-circle" width="50" src="assets/img/users/user-4.png">
                                <div class="media-body">
                                    <div class="media-title">Sarah Smith</div>
                                    <div class="text-job text-muted">Web Developer</div>
                                </div>
                                <div class="media-items">
                                    <div class="media-item">
                                        <div class="media-value">1,821</div>
                                        <div class="media-label">Posts</div>
                                    </div>
                                    <div class="media-item">
                                        <div class="media-value">14K</div>
                                        <div class="media-label">Followers</div>
                                    </div>
                                    <div class="media-item">
                                        <div class="media-value">2,891</div>
                                        <div class="media-label">Following</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
