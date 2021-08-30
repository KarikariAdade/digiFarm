@extends('layouts.business')
@section('content')
    <section>
        <div class="card card-success">
            <div class=" mt-3 mb-3">
                <div class="text-center">
                    <h3>Requests</h3>
                </div>
                <a class="btn btn-success shadow-success" style="position:absolute;top: 13px; right: 20px;" href="{{ route('business.dashboard.request.index') }}"><span class="fa fa-table"></span> Table View</a>
            </div>
            <div class="card-body">
                @foreach($requests as $request)
                <div class="item-click">
                    <article>
                        <div class="brows-company row">
                            <div class="col-md-4 col-sm-4">
                                <div class="brows-company-name">
                                    <a href="company-detail.html">
                                        <h4>
                                            @if($request->is_approved != false)
                                                <span class="fa fa-check-circle fa-sm text-success"></span>
                                            @else
                                                <span class="fa fa-circle-notch fa-sm text-warning"></span>
                                            @endif
                                                {{ $request->title }}
                                        </h4>
                                    </a>
                                    <span class="brows-company-tagline ml-4">{{ ucwords(str_replace('_', ' ', $request->request_type)) }}</span>
                                </div>
                            </div>
                            <div class="col-md-5 text-center">
                                <div class="brows-company-location">
                                    @if($request->is_approved != false)
                                        <span class="badge badge-success shadow-success">Approved</span>
                                    @else
                                        <span class="badge badge-warning shadow-warning">Pending</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="brows-company-position">
                                    <a href="{{ route('business.dashboard.request.show', $request->id) }}" class="btn mr-2 btn-primary shadow-primary text-white"><span class="fa fa-eye"></span></a>
                                    <a href="{{ route('business.dashboard.request.edit', $request->id) }}" class="btn mr-2 btn-warning shadow-warning text-white"><span class="fa fa-edit"></span></a>
                                    @if($request->is_approved != true)
                                        <a href="{{ route('business.dashboard.request.approve', $request->id) }}" class="btn mr-2 btn-success shadow-success text-white"><span class="fa fa-stamp"></span></a>
                                    @endif
                                    <a href="{{ route('business.dashboard.request.delete', $request->id) }}" class="btn mr-2 btn-danger shadow-danger text-white"><span class="fa fa-trash"></span></a>

                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
                <div class="col-md-12" align="right">
                    {{ $requests->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>
@endsection


