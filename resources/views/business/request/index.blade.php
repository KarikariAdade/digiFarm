@extends('layouts.business')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
               <div>
                   <h3>Requests</h3>
                   <div style="float: right; margin-top: -40px;">
                       <a href="{{ route('business.dashboard.request.create') }}" class="btn btn-success"><span class="fa fa-plus-circle"></span> Make New Request</a>
                       <a href="" class="btn btn-warning"><span class="fa fa-bars"></span> Switch View</a>
                   </div>
               </div>
                <form class="row mt-4">
                    <div class="col-md-3 form-group">
                        <label>From</label>
                        <input class="form-control" name="from" type="date">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>To</label>
                        <input class="form-control" name="from" type="date">
                    </div>
                    <div class="col-md-3 form-group">
                        <label>Status</label>
                        <select name="status" class="form-control select2">
                            <option>Approved</option>
                            <option>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-3 pt-4">
                        <button class="btn btn-success mt-1">Generate Entries</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
