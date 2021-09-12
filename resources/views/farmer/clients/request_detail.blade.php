@extends('layouts.farmer')
@section('content')
    <div class="card card-success">
        <div class="card-body">
            <div class="text-center">
                <h3 class="mb-4">Request For Bananas</h3>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>TITLE / NAME</b></td><td class="f-bold">{{ $request->title }}</td></tr>
                            <tr><td style="width: 200px;"><b>REQUEST TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</td></tr>
                            <tr><td style="width: 200px;"><b>PRODUCT TYPE</b></td><td class="f-bold">{{ ucwords(str_replace('_', ' ', $request->product_type)) }}</td></tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tbody>
                            <tr><td style="width: 200px;"><b>QUANTITY</b></td><td class="f-bold">{{ $request->quantity }}</td></tr>
                            <tr><td style="width: 200px;"><b>DUE DATE</b></td><td class="f-bold">{{ date('l M d, Y', strtotime($request->due_date)) }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <tbody><tr><td style="width: 200px;"><b>DESCRIPTION</b></td><td class="f-bold"><p>This is the description</p></td></tr>
                            </tbody></table>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </div>
    <div class=""></div>

@endsection
