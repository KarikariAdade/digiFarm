@extends('layouts.farmer')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div>
                    <h3>Clients</h3>
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
