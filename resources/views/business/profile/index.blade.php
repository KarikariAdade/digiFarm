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
                 <div class="f-bold">{{ auth()->user()->getBusinessType->name ?? null }}</div>
             </div>
         </div>
         <div class="row mt-4">
             <div class="col-md-6">
                 <div class="">
                     @if(!empty($socials->instagram))
                     <a href="{{ $socials->instagram }}" class="btn btn-social-icon mr-1 btn-instagram">
                         <i class="fab fa-instagram"></i>
                     </a>
                     @endif
                     @if(!empty($socials->twitter))
                     <a href="{{ $socials->twitter }}" class="btn btn-social-icon mr-1 btn-twitter">
                         <i class="fab fa-twitter"></i>
                     </a>
                     @endif
                     @if(!empty($socials->linkedin))
                     <a href="{{ $socials->linkedin }}" class="btn btn-social-icon mr-1 btn-linkedin">
                         <i class="fab fa-linkedin-in"></i>
                     </a>
                     @endif
                     @if(!empty($socials->facebook))
                     <a href="{{ $socials->facebook }}" class="btn btn-social-icon mr-1 btn-facebook">
                         <i class="fab fa-facebook-f"></i>
                     </a>
                     @endif

                 </div>
             </div>
             <div class="col-md-6" align="right">
                 <a href="{{ route('business.dashboard.profile.edit') }}" class="btn btn-success btn-success-disabled">Update Business Profile</a>
                 <a href="" class="btn btn-success">View Request Proposals</a>
             </div>
         </div>
     </div>
 </div>
 <div class="card card-success">
    <div class="card-body">
        <div class="card-body">
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
                                     @if(auth('business')->user()->secondary_email)
                                     <div class="col-md-4">
                                         <p class="f-bold">Secondary Email <br><span class="text-muted">{{ auth()->user()->secondary_email }}</span></p>
                                     </div>
                                     @endif
                                     @if(auth('business')->user()->primary_phone)
                                     <div class="col-md-4">
                                         <p class="f-bold">Primary Phone <br><span class="text-muted">{{ auth()->user()->primary_phone }}</span></p>
                                     </div>
                                     @endif
                                     @if(auth('business')->user()->secondary_phone)
                                     <div class="col-md-4">
                                         <p class="f-bold">Secondary Phone <br><span class="text-muted">{{ auth()->user()->secondary_phone }}</span></p>
                                     </div>
                                     @endif
                                     @if(auth()->user()->getBusinessSize)
                                     <div class="col-md-4">
                                         <p class="f-bold">Business Size <br><span class="text-muted">{{ auth()->user()->getBusinessSize->size ?? null }}</span></p>
                                     </div>
                                     @endif
                                     @if(auth('business')->user()->tax_number)
                                     <div class="col-md-4">
                                         <p class="f-bold">Tax Number <br><span class="text-muted">{{ auth()->user()->tax_number }}</span></p>
                                     </div>
                                     @endif
                                     @if(auth()->user()->business_document)
                                     <div class="col-md-6 mt-3">
                                         <a class="btn btn-warning text-white" href="">View Business Certificate</a>
                                     </div>
                                     <div class="col-md-6 mt-3">
                                         <a href="" class="btn btn-success">Download Business Certificate</a>
                                     </div>
                                     @endif
                                 </div>
                             </div>
                      </div>
                            @if(auth('business')->user()->description)
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <h3>Description</h3>
                                    </div>
                                    {!! auth()->user()->description !!}
                                </div>
                            </div>
                            @endif
                  </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
@endsection
