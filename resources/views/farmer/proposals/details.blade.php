@extends('layouts.farmer')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Proposal Details</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>MEASUREMENT UNIT</b></td><td class="f-bold">{{ $proposal->measurement_unit }}</td></tr>
                            <tr><td style="width: 200px;"><b>QUANTITY</b></td><td class="f-bold">{{ $proposal->quantity.' '.$proposal->measurement_unit }}</td></tr>
                            <tr><td style="width: 200px;"><b>PRICE QUOTE</b></td><td class="f-bold">{{ 'GHS '. number_format($proposal->price_quote, 2) }}</td></tr>
                            <tr><td style="width: 200px;"><b>EMAIL</b></td><td class="f-bold">{{ $proposal->email }}</td></tr>
                            <tr><td style="width: 200px;"><b>PHONE</b></td><td class="f-bold">{{ $proposal->phone }}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Request Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tr><td style="width: 100px;"><b>TITLE / NAME</b></td><td class="f-bold">{{ $proposal->getRequest->title }}</td></tr>
                                        <tr><td style="width: 100px;"><b>REQUEST TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $proposal->getRequest->request_type)) }}</td></tr>
                                        <tr><td style="width: 100px;"><b>PRODUCT TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $proposal->getRequest->product_type)) }}</td></tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tbody>
                                        <tr><td style="width: 100px;"><b>QUANTITY</b></td><td class="f-bold">{{ $proposal->getRequest->quantity }}</td></tr>
                                        <tr><td style="width: 100px;"><b>DUE DATE</b></td><td class="f-bold">{{ date('l M d, Y', strtotime($proposal->getRequest->due_date)) }}</td></tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <tbody><tr><td style="width: 100px;"><b>DESCRIPTION</b></td><td class="f-bold">{!! $proposal->getRequest->description !!}</td></tr>
                                        </tbody></table>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
