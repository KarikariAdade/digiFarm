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
                        <div class="card-body"></div>
                    </div>

                </div>
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-body"></div>
                </div>

            </div>
        </div>
    </section>

@endsection
