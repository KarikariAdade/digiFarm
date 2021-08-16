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
                   <div class="col-md-8">
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
                   <div class="col-md-4">
                   </div>
               </div>
           </div>
       </div>
    </section>
@endsection
