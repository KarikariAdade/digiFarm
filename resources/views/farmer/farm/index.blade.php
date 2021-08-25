@extends('layouts.farmer')
@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div class="">
                    <h4 class="f-bold text-dark">Farms</h4>
                    <div style="float: right; margin-top: -40px;">
                        <a href="{{ route('farmer.dashboard.farm.create') }}" class="btn btn-success shadow-success"><span class="fa fa-plus-circle"></span> Add New Farm</a>
                        <a href="{{ route('farmer.dashboard.farm.index') }}" class="btn btn-warning shadow-warning"><span class="fa fa-bars"></span> Switch View</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
