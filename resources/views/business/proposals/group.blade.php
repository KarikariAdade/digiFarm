@extends('layouts.business')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div>
                    <h3>Received Proposals</h3>
                    <div style="float: right; margin-top: -40px;">
                        <a href="{{ route('business.dashboard.proposal.index') }}" class="btn btn-success"><span class="fa fa-bars"></span> List Proposals</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive p-3">
                        {!! $dataTable->table(['class' => 'table table-hover text-center table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('custom-js')
    {!! $dataTable->scripts() !!}
@endpush
