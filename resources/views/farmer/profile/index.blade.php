@extends('layouts.farmer')
@push('custom-css')
<style>
.detail-pic {
    display: block;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    padding: 4px;
    transform: translateY(-10px);
}
.inputfile + label {
    width: 90px;
    font-size: 1.25rem;
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 1px;
    height: 90px;
    background: #228B22;
    border-radius: 50%;
}
.inputfile + label i {
    line-height: 90px;
    text-align: center;
    font-size: 55px;
    color: #fff;
    display: block;
    background: 0 0;
    border-radius: 50%;
}
</style>
@endpush
@section('content')
<section class="section">
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                    <div class="card-body">
                        <div class="author-box-center">
                            @if(auth()->user()->avatar)
                            <img alt="image" class="mb-3" src="{{ asset(auth()->user()->avatar) }}" style="width: 100px; height: 100px; border-radius: 50%;">
                            @endif
                            <div class="clearfix"></div>
                            <div class="author-box-name">
                                <a href="#">{{ auth()->user()->name }}</a>
                            </div>
                                <div class="author-box-job">{{ auth()->user()->code ? '#'.auth()->user()->code : '' }}</div>
                        </div>
                        <div class="text-center">
                            @if($socials)
                            <div class="mb-2 mt-3">
                                <div class="text-small font-weight-bold">Your Socials</div>
                            </div>
                            @endif
                            @if(!empty($socials->facebook))
                            <a href="{{ $socials->facebook }}" class="btn btn-social-icon mr-1 btn-facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            @endif
                            @if(!empty($socials->twitter))
                            <a href="{{ $socials->twitter }}" class="btn btn-social-icon mr-1 btn-twitter">
                                <i class="fab fa-twitter"></i>
                            </a>@endif
                            @if(!empty($socials->instagram))
                            <a href="{{ $socials->instagram }}" class="btn btn-social-icon mr-1 btn-instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                            @endif
                            @if(!empty($socials->linkedin))
                            <a href="{{ $socials->linkedin }}" class="btn btn-social-icon mr-1 btn-linkedin">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            @endif
                            <div class="w-100 d-sm-none"></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Personal Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="py-4">
                            @if(!empty($socials->website))
                                <p class="clearfix">
                                <span class="float-left">
                                  Website
                              </span>
                                    <span class="float-right text-muted">
                                  <a href="{{ $socials->website }}" class="badge badge-success shadow-success text-white">Click Here</a>
                              </span>
                                </p>
                            @endif
                          <p class="clearfix">
                            <span class="float-left">
                              Phone
                          </span>
                          <span class="float-right text-muted">
                              {{ auth()->user()->phone }}
                          </span>
                      </p>
                      <p class="clearfix">
                        <span class="float-left">
                          Mail
                      </span>
                      <span class="float-right text-muted">
                          {{ auth()->user()->email }}
                      </span>
                  </p>
                  <p class="clearfix">
                    <span class="float-left">
                      Country
                  </span>
                  <span class="float-right text-muted">
                      <a href="#">{{ auth()->user()->getCountry->name}}</a>
                  </span>
              </p>
              <p class="clearfix">
                <span class="float-left">
                  Region
              </span>
              <span class="float-right text-muted">
                  <a href="#">{{ auth()->user()->getRegion->name }}</a>
              </span>
          </p>
                                <p class="clearfix">
                <span class="float-left">
                  City
              </span>
                                    <span class="float-right text-muted">
                  <a href="#">{{ auth()->user()->city }}</a>
              </span>
                                </p>
                                <p class="clearfix">
                <span class="float-left">
                  Address
              </span>
                                    <span class="float-right text-muted">
                  <a href="#">{{ auth()->user()->address }}</a>
              </span>
                                </p>
      </div>
  </div>
</div>
</div>
<div class="col-12 col-md-12 col-lg-8">
    <div class="card">
        <div class="padding-20">
            <ul class="nav nav-pills row" id="myTab2" role="tablist">
                <li class="col-md-6 nav-item text-center">
                    <a class="nav-link active f-bold" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                    aria-selected="true">About</a>
                </li>
                <li class="col-md-6 nav-item text-center">
                    <a class="nav-link f-bold" id="profile-tab2" data-toggle="tab" href="#update" role="tab"
                    aria-selected="false">Update Profile</a>
                </li>
            </ul>
            <div class="tab-content" id="myTab3Content">
                <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                    <div class="m-t-30">
                        {{ auth()->user()->description }}
                    </div>
                </div>
                <div class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="profile-tab2">
                    <form method='POST' class="farmer_profile_update" action="{{ route('farmer.dashboard.profile.update') }}">
                        @csrf
                        @method('POST')
                        <div class="card-body">
                            <div class="errorMsg"></div>
                            <div class="text-center">
                                <div class="detail-pic js">
                                    <div class="box">
                                        <input type="file" name="avatar" id="upload-pic" class="inputfile">
                                        <label for="upload-pic"><i class="fa fa-upload" aria-hidden="true"></i><span></span></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Full Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="full_name" value="{{ auth()->user()->name }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" name="email" value="{{ auth()->user()->email }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Phone <span class="text-danger">*</span></label>
                                    <input class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Country <span class="text-danger">*</span></label>
                                    <select class="form-control select2" id="country" name="country">
                                        <option></option>
                                        @foreach($countries as $country)
                                        <option value="{{ $country->id }}" {{ old('country') == $country->id || $country->id == auth()->user()->country ? 'selected' : null }}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Region <span class="text-danger">*</span></label>
                                    <select class="form-control select2" style="width: 100%;" name="region" id="region">
                                        @if(auth()->user()->region)
                                        <option value="{{ auth()->user()->region }}">{{ auth()->user()->region }}</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>City <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="city" value="{{ auth()->user()->city }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>House Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="address" value="{{ auth()->user()->address }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label>Facebook Url</label>
                                    <input type="url" name="facebook_url" class="form-control" value="{{ $socials->facebook ?? null }}">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Instagram Url</label>
                                    <input type="url" name="instagram_url" class="form-control" value="{{ $socials->instagram ?? null }}">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Twitter Url</label>
                                    <input type="url" name="twitter_url" class="form-control" value="{{ $socials->twitter ?? null }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>LinkedIn Url</label>
                                    <input type="url" name="linkedin_url" class="form-control" value="{{ $socials->linkedin ?? null }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Website Url</label>
                                    <input type="url" name="website_url" class="form-control" value="{{ $socials->website ?? null }}">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Description</label>
                                    <textarea class="form-control"  name="description" rows="10">{{ old('description') ?? auth()->user()->description }}</textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-success shadow-success" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>

@endsection
@push('custom-js')
<script>

    $(document).ready(function () {
        let url = '',
        region = $('#region'),
        country = $('#country'),
        data;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let selectChange = country.change(function () {
            loadRegions();
        });

        if (selectChange == true) {

            loadRegions();
        }

        loadRegions()


        function loadRegions() {

            url = `{{ route('request.get.region') }}`;

            data = country.val();

            $.post(url, {'country': data}, function (response) {
                region.html(response.msg);
            })
        }
    });
</script>
@endpush
