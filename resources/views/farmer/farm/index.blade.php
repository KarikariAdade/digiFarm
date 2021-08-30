@extends('layouts.farmer')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div>
                    <h3>Farms</h3>
                    <div style="float: right; margin-top: -40px;">
                        <a href="{{ route('farmer.dashboard.farm.create') }}" class="btn btn-success"><span class="fa fa-plus-circle"></span> Add New Farm</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 table-responsive p-3">
                        {!! $dataTable->table(['class' => 'table text-center table-hover table-striped']) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('custom-js')
    {!! $dataTable->scripts() !!}
@endpush
