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
                       <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
                       <div class="clearfix"></div>
                       <div class="author-box-name">
                           <a href="#">{{ auth()->user()->name }}</a>
                       </div>
                       <div class="author-box-job">Web Developer</div>
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
                           <a href="#" class="btn btn-social-icon mr-1 btn-instagram">
                               <i class="fab fa-instagram"></i>
                           </a>
                           <a href="#" class="btn btn-social-icon mr-1 btn-twitter">
                               <i class="fab fa-twitter"></i>
                           </a>
                           <a href="#" class="btn btn-social-icon mr-1 btn-linkedin">
                               <i class="fab fa-linkedin-in"></i>
                           </a>
                           <a href="#" class="btn btn-social-icon mr-1 btn-facebook">
                               <i class="fab fa-facebook-f"></i>
                           </a>
                       </div>
                   </div>
                   <div class="col-md-6" align="right">
                       <a href="" class="btn btn-success btn-success-disabled">Update Business Profile</a>
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
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur.
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
                                                            <a href="#" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href="#" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
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
