@extends('layouts.farmer')
@section('content')
    <section class="card card-success">
        <div class="card-body">
            <div class="text-center">
                <div class="author-box-center">
                    @if(auth()->user()->avatar)
                        <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle author-box-picture">
                    @endif
                    <div class="clearfix"></div>
                    <div class="author-box-name">
                        <p class="f-bold pt-3">{{ auth()->user()->name }} ></p>
                    </div>
                    <div class="f-bold">{{ auth()->user()->name }}</div>
                </div>
            </div>
        </div>
    </section>
@endsection
