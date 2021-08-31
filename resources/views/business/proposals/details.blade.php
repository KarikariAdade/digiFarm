@extends('layouts.business')
@section('content')
    <div class="card card-success">
        <div class="card-body">
            <div class="text-center">
                <h4 class="mb-4 f-bold">Request details</h4>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>TITLE / NAME</b></td><td class="f-bold">{{ $proposal->getRequest->title }}</td></tr>
                            <tr><td style="width: 200px;"><b>REQUEST TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $proposal->getRequest->request_type)) }}</td></tr>
                            <tr><td style="width: 200px;"><b>PRODUCT TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $proposal->getRequest->product_type)) }}</td></tr>
                            <tr><td style="width: 200px;"><b>QUANTITY</b></td><td class="f-bold">{{ $proposal->getRequest->quantity }}</td></tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>AMOUNT</b></td><td class="f-bold">GHC {{ number_format($proposal->getRequest->amount, 2) }}</td></tr>
                            <tr><td style="width: 200px;"><b>DUE DATE</b></td><td class="f-bold">{{ date('l M d, Y', strtotime($proposal->getRequest->due_date)) }}</td></tr>
                            <tr><td style="width: 200px;"><b>STATUS</b></td><td class="f-bold">{!! $proposal->getRequest->is_approved != false ? '<span class="badge badge-success shadow-success">Approved</span>' : '<span class="badge badge-warning shadow-warning">Pending</span>' !!}</td></tr>
                        </table>
                    </div>
                </div>
                @if($proposal->getRequest->description)
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr><td style="width: 200px;"><b>DESCRIPTION</b></td><td class="f-bold">{!! $proposal->getRequest->description !!}</td></tr>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card card-success">
        <div class="card-body">
            <div class="text-center">
                <h3 class="mb-4">Proposal Details</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>FARMER NAME</b></td><td class="f-bold">{{ $proposal->getUser->name }}</td></tr>
                            <tr><td style="width: 200px;"><b>FARMER PHONE</b></td><td class="f-bold">{{ $proposal->getUser->phone }}</td></tr>
                            <tr><td style="width: 200px;"><b>FARMER EMAIL</b></td><td class="f-bold">{{ $proposal->getUser->email }}</td></tr>
                            <tr><td style="width: 200px;"><b>COUNTRY</b></td><td class="f-bold">{{ $proposal->getUser->getCountry->name }}</td></tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>REGION</b></td><td class="f-bold">{{ $proposal->getUser->getRegion->name }}</td></tr>
                            <tr><td style="width: 200px;"><b>CITY</b></td><td class="f-bold">{{ $proposal->getUser->city }}</td></tr>
                            <tr><td style="width: 200px;"><b>ADDRESS</b></td><td class="f-bold">{{ $proposal->getUser->address }}</td></tr>
                            <tr><td style="width: 200px;"><b>PROPOSAL STATUS</b></td><td class="f-bold">
                                    @if($proposal->status === 'approved')
                                        <span class="badge badge-success shadow-success">Approved</span>
                                    @elseif($proposal->status === 'declined')
                                        <span class="badge badge-danger shadow-danger">Declined</span>
                                    @elseif($proposal->status === 'pending')
                                        <span class="badge badge-info shadow-info">Pending</span>
                                        @endif
                                </td></tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>PROPOSAL MESSAGE</b></td><td class="f-bold">{{ $proposal->message }}</td></tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-6 text-right">
                    @if($proposal->status === 'pending')
                    <a href="{{ route('business.dashboard.proposal.approve', $proposal->id) }}" class="btn btn-success shadow-success">
                        <span class="fa fa-check-circle"></span> Approve Proposal
                    </a>
                    <a href="{{ route('business.dashboard.proposal.decline', $proposal->id) }}" class="btn btn-danger shadow-danger">
                        <span class="fa fa-times-circle"></span> Decline Proposal
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card card-success">
        <div class="text-center mt-4">
            <h3>Farmer Farms</h3>
        </div>
        <div class="card-body">
            <div class="col-md-12 table-responsive p-3">
                {!! $dataTable->table(['class' => 'table table-hover table-striped']) !!}
            </div>
        </div>
    </div>
@endsection
@push('custom-js')
    {!! $dataTable->scripts() !!}
@endpush
