@extends('layouts.business')
@push('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/account/bundles/bootstrap-social/bootstrap-social.css') }}">
    <style>

    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if($client->getUser->avatar)
                        <img alt="image" src="{{ asset($client->getUser->avatar) }}" class="rounded-circle profile-widget-picture">
                        @endif
                        <div class="profile-widget-items">
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Country</div>
                                <div class="profile-widget-item-value">{{ $client->getUser->getCountry->name }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">Region</div>
                                <div class="profile-widget-item-value">{{ $client->getUser->getRegion->name }}</div>
                            </div>
                            <div class="profile-widget-item">
                                <div class="profile-widget-item-label">City</div>
                                <div class="profile-widget-item-value">{{ $client->getUser->city }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="profile-widget-description pb-0">
                        <div class="profile-widget-name">{{ $client->getUser->name }} <div class="text-muted d-inline font-weight-normal">
                                <div class="slash"></div> {{ $client->getUser->email }}
                            </div>
                        </div>
                        <p>{{ $client->getUser->description }}</p>
                    </div>
                    <div class="card-footer text-center pt-0">
                        <div class="font-weight-bold mb-2 text-small">Follow {{ $client->getUser->name }} On</div>
                        @if(!empty($client->getUser->getSocials->instagram))
                            <a href="{{ $client->getUser->getSocials->instagram }}" class="btn btn-social-icon mr-1 btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if(!empty($client->getUser->getSocials->twitter))
                            <a href="{{ $client->getUser->getSocials->twitter }}" class="btn btn-social-icon mr-1 btn-twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if(!empty($client->getUser->getSocials->linkedin))
                            <a href="{{ $client->getUser->getSocials->linkedin }}" class="btn btn-social-icon mr-1 btn-linkedin">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                        @if(!empty($client->getUser->getSocials->facebook))
                            <a href="{{ $client->getUser->getSocials->facebook }}" class="btn btn-social-icon mr-1 btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card card-success">
                    <div class="card-header" style="text-align: center !important; display: inline !important;">
                        <h4 class="">Address Details</h4>
                    </div>
                    <div class="card-body">
                        <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Phone
                                          </span>
                            <span class="float-right f-bold">
                                              {{ $client->getUser->phone }}
                                          </span>
                        </p>
                        <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              No. of Farms
                                          </span>
                            <span class="float-right f-bold">
                                              {{ $client->getUser->getFarms->count() }}
                                          </span>
                        </p>
                        <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Rating
                                          </span>
                            <span class="float-right f-bold">
                                              Agona
                                          </span>
                        </p>
                        <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Reviews
                                          </span>
                            <span class="float-right f-bold">
                                              Ghana
                                          </span>
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Farms</h4>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12 table-responsive p-3">
                            {!! $dataTable->table(['class' => 'table table-hover table-striped']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card card-success">
                    <div class="card-header">
                        <h4>Write a review for {{ $client->getUser->name }}</h4>
                    </div>
                    <div class="card-body">
                        <!-- Write Review Form -->
                        <form method="POST" action="" class="review_form">
                            @csrf
                            @method('POST')
                            <div class="errorMsg">
                            </div>
                            <div class="form-group">
                                <label>Rating</label>
                                <div class="star-rating">
                                    <input id="star-5" type="radio" name="rating" value="5">
                                    <label for="star-5" title="5 stars">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                    <input id="star-4" type="radio" name="rating" value="4">
                                    <label for="star-4" title="4 stars">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                    <input id="star-3" type="radio" name="rating" value="3">
                                    <label for="star-3" title="3 stars">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                    <input id="star-2" type="radio" name="rating" value="2">
                                    <label for="star-2" title="2 stars">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                    <input id="star-1" type="radio" name="rating" value="1">
                                    <label for="star-1" title="1 star">
                                        <i class="active fa fa-star"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Title of your review</label>
                                <input class="form-control" type="text" name="title" placeholder="If you could say it in one sentence, what would you say?">
                            </div>
                            <div class="form-group">
                                <label>Your review</label>
                                <textarea id="review_desc" maxlength="100" name="description" class="form-control"></textarea>
                                <div class="d-flex justify-content-between mt-3"><small class="text-muted"><span id="chars">300</span> characters remaining</small></div>
                            </div>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-success submit-btn">Add Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-js')
    {!! $dataTable->scripts() !!}
@endpush