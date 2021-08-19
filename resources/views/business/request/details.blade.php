@extends('layouts.business')
@section('content')
    <section>
        <div class="card card-success">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="mb-4">{{ $request->title }}</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr><td style="width: 200px;"><b>TITLE / NAME</b></td><td class="f-bold">{{ $request->title }}</td></tr>
                                <tr><td style="width: 200px;"><b>REQUEST TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</td></tr>
                                <tr><td style="width: 200px;"><b>PRODUCT TYPE</b></td><td class="f-bold">{{ $request->product_type }}</td></tr>
                                <tr><td style="width: 200px;"><b>QUANTITY</b></td><td class="f-bold">{{ $request->quantity }}</td></tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr><td style="width: 200px;"><b>AMOUNT</b></td><td class="f-bold">GHC {{ number_format($request->amount, 2) }}</td></tr>
                                <tr><td style="width: 200px;"><b>DUE DATE</b></td><td class="f-bold">{{ date('l M d, Y', strtotime($request->due_date)) }}</td></tr>
                                <tr><td style="width: 200px;"><b>STATUS</b></td><td class="f-bold">{!! $request->is_approved != false ? '<span class="badge badge-success shadow-success">Approved</span>' : '<span class="badge badge-warning shadow-warning">Pending</span>' !!}</td></tr>
                            </table>
                        </div>
                    </div>
                    @if($request->description)
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <tr><td style="width: 200px;"><b>DESCRIPTION</b></td><td class="f-bold">{!! $request->description !!}</td></tr>
                            </table>
                        </div>
                    </div>
                    @endif
                    <div class="col-md-6"></div>
                    <div class="col-md-6" style="text-align: right;">
                        <a href="{{ route('business.dashboard.request.edit', $request->id) }}" class="btn mr-2 btn-warning shadow-warning text-white"><span class="fa fa-edit"></span> Update Request</a>
                        @if($request->is_approved != true)
                        <a href="{{ route('business.dashboard.request.approve', $request->id) }}" class="btn mr-2 btn-success shadow-success text-white"><span class="fa fa-stamp"></span> Approve Request</a>
                        @endif
                        <a href="{{ route('business.dashboard.request.delete', $request->id) }}" class="btn mr-2 btn-danger shadow-danger text-white"><span class="fa fa-trash"></span> Delete Request</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-success">
            <div class="text-center mt-3 mb-3">
                <h3>Client Proposals</h3>
            </div>
            <div class="card-body">
                <h1>Proposals go here</h1>
            </div>
        </div>
    </section>
@endsection
