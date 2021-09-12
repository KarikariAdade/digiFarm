@extends('layouts.farmer')
@push('custom-css')
<link rel="stylesheet" href="{{ asset('assets/account/bundles/bootstrap-social/bootstrap-social.css') }}">
<style>
.alert.alert-danger, .alert.alert-success{
    color: #fff !important;
}
</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7">
            <div class="card profile-widget">
                <div class="profile-widget-header">
                    @if($client->getBusiness->business_logo)
                    <img alt="image" src="{{ asset($client->getBusiness->business_logo) }}" class="rounded-circle profile-widget-picture">
                    @endif
                    <div class="profile-widget-items">
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Country</div>
                            <div class="profile-widget-item-value">{{ $client->getBusiness->getCountry->name }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">Region</div>
                            <div class="profile-widget-item-value">{{ $client->getBusiness->getRegion->name }}</div>
                        </div>
                        <div class="profile-widget-item">
                            <div class="profile-widget-item-label">City</div>
                            <div class="profile-widget-item-value">{{ $client->getBusiness->city }}</div>
                        </div>
                    </div>
                </div>
                <div class="profile-widget-description pb-0">
                    <div class="profile-widget-name">{{ $client->getBusiness->name }} <div class="text-muted d-inline font-weight-normal">
                        <div class="slash"></div> {{ $client->getBusiness->email }}
                    </div>
                </div>
                <div>
                </div>
            </div>
            {{ $client->getBusiness->getBusinessSocials }}
            <div class="card-footer text-center pt-0">
                <div class="font-weight-bold mb-2 text-small">Follow {{ $client->getBusiness->name }} On</div>
                @if(!empty($client->getBusiness->getBusinessSocials->instagram))
                <a href="{{ $client->getBusiness->getBusinessSocials->instagram }}" class="btn btn-social-icon mr-1 btn-instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                @endif
                @if(!empty($client->getBusiness->getBusinessSocials->twitter))
                <a href="{{ $client->getBusiness->getBusinessSocials->twitter }}" class="btn btn-social-icon mr-1 btn-twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                @endif
                @if(!empty($client->getBusiness->getBusinessSocials->linkedin))
                <a href="{{ $client->getBusiness->getBusinessSocials->linkedin }}" class="btn btn-social-icon mr-1 btn-linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                @endif
                @if(!empty($client->getBusiness->getBusinessSocials->facebook))
                <a href="{{ $client->getBusiness->getBusinessSocials->facebook }}" class="btn btn-social-icon mr-1 btn-facebook">
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
                      Primary Phone
                  </span>
                  <span class="float-right f-bold">
                      {{ $client->getBusiness->primary_phone }}
                  </span>
              </p>
                <p class="clearfix" style="font-size: 16px;">
                    <span class="float-left f-bold">
                      Secondary Phone
                  </span>
                    <span class="float-right f-bold">
                      {{ $client->getBusiness->secondary_phone }}
                  </span>
                </p>
                <p class="clearfix" style="font-size: 16px;">
                    <span class="float-left f-bold">
                      Secondary Email
                  </span>
                    <span class="float-right f-bold">
                      {{ $client->getBusiness->secondary_email }}
                  </span>
                </p>
                <p class="clearfix" style="font-size: 16px;">
                    <span class="float-left f-bold">
                      Business Type
                  </span>
                    <span class="float-right f-bold">
                      {{ $client->getBusiness->getBusinessType->name }}
                  </span>
                </p>
              <p class="clearfix" style="font-size: 16px;">
                <span class="float-left f-bold">
                  No. of Requests
              </span>
              <span class="float-right f-bold">
                  {{ $client->getBusiness->getMarketRequests->count() }}
              </span>
          </p>

      </div>
  </div>
</div>
</div>
    <div class="card card-success">
        <div class="card-header">
            <h4>Requests</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 table-responsive p-3">
                    {!! $dataTable->table(['class' => 'table text-center table-hover table-striped']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-js')
    {!! $dataTable->scripts() !!}
@endpush
