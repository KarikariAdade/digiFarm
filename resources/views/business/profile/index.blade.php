@extends('layouts.business')
@push('custom-css')
<link rel="stylesheet" href="{{ asset('assets/account/bundles/bootstrap-social/bootstrap-social.css') }}">
@endpush
@section('content')
<section class="container">
 <div class="card card-success">
     <div class="card-body">
         <div class="text-center">
             <div class="author-box-center">
                 @if(auth('business')->user()->business_logo)
                 <img alt="image" src="{{ asset(auth('business')->user()->business_logo) }}" class="rounded-circle author-box-picture">
                 @endif
                 <div class="clearfix"></div>
                 <div class="author-box-name">
                     <p class="f-bold pt-3">{{ auth()->user()->name }} {!! auth()->user()->is_approved != false ? '<span class="fa fa-check-circle text-success"></span>' : null !!}</p>
                 </div>
                 <div class="f-bold">{{ auth()->user()->getBusinessType->name }}</div>
             </div>
         </div>
         <div class="row mt-5 mb-5">
             <div class="col-md-4 text-center">
                 <h1>493</h1>
                 <h4>Total Clients</h4>
             </div>
             <div class="col-md-4 text-center">
                 <h1>493</h1>
                 <h4>Total Clients</h4>
             </div>
             <div class="col-md-4 text-center">
                 <h1>493</h1>
                 <h4>Total Clients</h4>
             </div>
         </div>
         <hr>
         <div class="row">
             <div class="col-md-6">
                 <div class="">
                     @if(!empty($socials->instagram))
                     <a href="{{ $socials->instagram }}" class="btn btn-social-icon mr-1 btn-instagram">
                         <i class="fab fa-instagram"></i>
                     </a>
                     @endif
                     @if($socials->twitter)
                     <a href="{{ $socials->twitter }}" class="btn btn-social-icon mr-1 btn-twitter">
                         <i class="fab fa-twitter"></i>
                     </a>
                     @endif
                     @if($socials->linkedin)
                     <a href="{{ $socials->linkedin }}" class="btn btn-social-icon mr-1 btn-linkedin">
                         <i class="fab fa-linkedin-in"></i>
                     </a>
                     @endif
                     @if($socials->facebook)
                     <a href="{{ $socials->facebook }}" class="btn btn-social-icon mr-1 btn-facebook">
                         <i class="fab fa-facebook-f"></i>
                     </a>
                     @endif

                 </div>
             </div>
             <div class="col-md-6" align="right">
                 <a href="{{ route('business.dashboard.profile.edit') }}" class="btn btn-success btn-success-disabled">Update Business Profile</a>
                 <a href="" class="btn btn-warning">View Request Proposals</a>
             </div>
         </div>
     </div>
 </div>
 <div class="card card-success">
    <div class="card-body">
        <div class="card-body">
            <ul class="nav nav-pills row" id="myTab3" role="tablist">
                <li class="nav-item col-md-4 text-center">
                    <a class="nav-link font-weight-600 active" id="home-tab3" data-toggle="tab" href="#home3" role="tab" aria-controls="home" aria-selected="true">About</a>
                </li>
                <li class="nav-item col-md-4 text-center">
                    <a class="nav-link font-weight-600" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab" aria-controls="profile" aria-selected="false">Most Recent Clients</a>
                </li>
                <li class="nav-item col-md-4 text-center">
                    <a class="nav-link font-weight-600" id="contact-tab3" data-toggle="tab" href="#contact3" role="tab" aria-controls="contact" aria-selected="false">Most Recent Requests</a>
                </li>
            </ul>
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="home3" role="tabpanel" aria-labelledby="home-tab3">
                         <div class="row mt-3 mb-3">
                             <div class="col-md-5">
                                 <div class="card card-success">
                                     <div class="card-header" style="text-align: center !important; display: inline !important;">
                                         <h4 class="">Address Details</h4>
                                     </div>
                                     <div class="card-body">
                                         <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Country
                                          </span>
                                          <span class="float-right f-bold">
                                              {{ auth()->user()->getCountry->name }}
                                          </span>
                                      </p>
                                         <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Region / State
                                          </span>
                                             <span class="float-right f-bold">
                                              {{ auth()->user()->getRegion->name }}
                                          </span>
                                         </p>
                                         <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              City
                                          </span>
                                             <span class="float-right f-bold">
                                              {{ auth()->user()->city }}
                                          </span>
                                         </p>
                                         <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                              Country
                                          </span>
                                             <span class="float-right f-bold">
                                              {{ auth()->user()->getCountry->name }}
                                          </span>
                                         </p>
                                         <p class="clearfix" style="font-size: 16px;">
                                            <span class="float-left f-bold">
                                                Address
                                          </span>
                                             <span class="float-right f-bold" style="font-size: 14px;">
                                              {{ auth()->user()->address }}
                                          </span>
                                         </p>
                                  </div>
                              </div>
                          </div>
                             <div class="col-md-7">
                                 <div class="row">
                                     <div class="col-md-4">
                                         <p class="f-bold">Primary Email <br><span class="text-muted">{{ auth()->user()->email }}</span></p>
                                     </div>
                                     <div class="col-md-4">
                                         <p class="f-bold">Secondary Email <br><span class="text-muted">{{ auth()->user()->secondary_email }}</span></p>
                                     </div>
                                     <div class="col-md-4">
                                         <p class="f-bold">Primary Phone <br><span class="text-muted">{{ auth()->user()->primary_phone }}</span></p>
                                     </div>
                                     <div class="col-md-4">
                                         <p class="f-bold">Secondary Phone <br><span class="text-muted">{{ auth()->user()->secondary_phone }}</span></p>
                                     </div>
                                     <div class="col-md-4">
                                         <p class="f-bold">Business Size <br><span class="text-muted">{{ auth()->user()->getBusinessSize->size }}</span></p>
                                     </div>
                                     <div class="col-md-4">
                                         <p class="f-bold">Tax Number <br><span class="text-muted">{{ auth()->user()->tax_number }}</span></p>
                                     </div>

                                 </div>
                             </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="manage-cndt">
                                <div class="cndt-status pending">Pending</div>
                                <div class="cndt-caption">
                                    <div class="cndt-pic">
                                        <img src="assets/img/client-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <h4>Charles Hopman</h4>
                                    <span>MultiFarmer</span>
                                    <p>Our analysis team at Megriosft use end to end innovation proces</p>
                                </div>
                                <a href="#" title="" class="cndt-profile-btn">View Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact3" role="tabpanel" aria-labelledby="contact-tab3">
                    <div class="row">
                        <div class="col-md-12 mt-4 mb-4">
                            <div class="mng-company row">
                                <div class="col-md-2 col-sm-2">
                                    <div class="mng-company-pic">
                                        <img src="assets/img/com-1.jpg" class="img-responsive" alt="">
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <div class="mng-company-name">
                                        <h4>Autodesk <span class="cmp-tagline">(Software Company)</span></h4>
                                        <span class="cmp-time">10 Hour Ago</span>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="mng-company-location">
                                        <p><i class="fa fa-map-marker"></i> Street #210, Make New London</p>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-1">
                                    <div class="mng-company-action">
                                        <a href="#" class="text-success" data-toggle="tooltip" title="" data-original-title="View Request Details"><i class="fa fa-eye"></i></a>
                                        {{--                                                            <a href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
@endsection
