@extends('layouts.farmer')
@push('custom-css')
    <link rel="stylesheet" href="{{ asset('assets/account/css/magnific-popup.css') }}">
@endpush
@section('content')
    <section class="card card-success">
        <div class="card-body">
            <h4 class="text-dark text-center">{{ $farm->name }}</h4>
            <div class="row">
                    <div class="table-responsive col-md-6">
                        <table class="table table-hover table-bordered">
                            <tr><td style="width: 200px;"><b>FARM NAME</b></td><td class="f-bold">{{ $farm->name }}</td></tr>
                            <tr><td style="width: 200px;"><b>FARM CATEGORY</b></td><td class="f-bold">{{ $farm->getCategory->name }}</td></tr>
                            <tr><td style="width: 200px;"><b>FARM TYPE</b></td><td class="f-bold">{{ $farm->getSubCategory->name }}</td></tr>
                            <tr><td style="width: 200px;"><b>ADDRESS</b></td><td class="f-bold">{{ $farm->address }}</td></tr>
                        </table>
                    </div>
                <div class="table-responsive col-md-6">
                    <table class="table table-hover table-bordered">
                        <tr><td style="width: 200px;"><b>AVERAGE PRODUCTION</b></td><td class="f-bold">{{ $farm->average_production }}</td></tr>
                        @if($farm->getCategory->is_crop != true)
                        <tr><td style="width: 200px;"><b>N0. OF ANIMALS</b></td><td class="f-bold">{{ $farm->animal_number }}</td></tr>
                        @else
                       <tr><td style="width: 200px;"><b>LAND SIZE</b></td><td class="f-bold">{{ $farm->land_size }}</td></tr>
                        @endif
                    </table>
                </div>
                <div class="table-responsive col-md-12">
                    @if(!empty($farm->description))
                    <table class="table table-hover table-bordered">
                        <tr><td style="width: 200px;"><b>FARM DESCRIPTION</b></td><td class="f-bold">{{ $farm->description }}</td></tr>
                    </table>
                        @endif
                    <div class="text-right pb-4">
                        <a href="{{ route('farmer.dashboard.farm.edit', $farm->id) }}" class="btn btn-warning text-white shadow-warning">
                            <span class="fa fa-edit"></span> Update Farm
                        </a>
                        <a href="{{ route('farmer.dashboard.farm.delete', $farm->id) }}" class="btn btn-danger text-white shadow-danger">
                            <span class="fa fa-trash"></span> Delete Farm
                        </a>
                    </div>
                </div>
            </div>
            </div>
    </section>
    @if($farm->getImages->count() > 0)
    <section class="card card-success">
        <div class="card-body">
            <h4 class="text-dark text-center">Farm Images</h4>
            <div class="errorMsg"></div>
            <div class="row parent-container mt-5 mb-5" id="parent-container">
                @foreach($farm->getImages as $image)
                    <div class="col-md-4">
                    <a href="{{ asset($image->path) }}" class=" farm-image">
                        <img class="img-fluid shadow rounded" src="{{ asset($image->path) }}">
                    </a>
                        <small class="btn btn-danger shadow btn-sm img_del_btn" onclick="delImg({{ $image->id }})"><span class="fa fa-trash"></span></small>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection


@push('custom-js')
    <script src="{{ asset('assets/account/js/jquery.magnific-popup.min.js') }}"></script>
    <script>
        $('.parent-container').magnificPopup({
            delegate: 'a', // child items selector, by clicking on it popup will open
            type: 'image',
            gallery: {
                enabled: true,
                preload: [0,2],
                navigateByImgClick: true,
                arrowMarkup: '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',
                tPrev: 'Previous (Left arrow key)',
                tNext: 'Next (Right arrow key)',
                tCounter: '<span class="mfp-counter">%curr% of %total%</span>'
            }
        });
        function delImg(id) {
           $.ajax({
               url: `{{ route('farmer.dashboard.farm.delete.image') }}`,
               data: {'image': id},
               method: 'POST',
           }).done((response) => {
               if (response.code == '200'){
                   $('.errorMsg').html('<p class="alert alert-success text-white"><span class="fa fa-exclamation-circle"></span> '+ response.msg +'</p>')
                   $("#parent-container").load(window.location.href + " #parent-container" );
               }else {
                   $('.errorMsg').html('<p class="alert alert-danger"><span class="fa fa-exclamation-circle"></span> '+ response.msg +'</p>')
               }
           })
        }


    </script>
@endpush
