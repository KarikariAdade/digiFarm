@extends('layouts.business')
@section('content')
    <div class="row">
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body card-type-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-muted mb-0">Clients</h6>
                            <span class="font-weight-bold mb-0">{{ $user->getClients->count() }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="card-circle l-bg-orange text-white">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body card-type-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-muted mb-0">Proposals</h6>
                            <span class="font-weight-bold mb-0">{{ $user->getProposals->count() }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="card-circle l-bg-cyan text-white">
                                <i class="fas fa-briefcase"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body card-type-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-muted mb-0">Requests</h6>
                            <span class="font-weight-bold mb-0">{{ $user->getMarketRequests->count() ?? 0 }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="card-circle l-bg-green text-white">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body card-type-3">
                    <div class="row">
                        <div class="col">
                            <h6 class="text-muted mb-0">Approved Req.</h6>
                            <span class="font-weight-bold mb-0">{{ $user->getApprovedRequests() }}</span>
                        </div>
                        <div class="col-auto">
                            <div class="card-circle l-bg-purple text-white">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                        </div>
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
